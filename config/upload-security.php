<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use ZipArchive;

class UploadSecurity
{
    private const ALLOWED_EXTENSIONS = [
        'jpg', 'jpeg', 'png', 'webp', 'bmp', 'apng', 'avif',
        'mp4', 'mpeg', 'ogg', 'webm', '3gp', 'mov', 'flv', 'avi', 'wmv', 'ts',
        'mp3', 'wav',
        'txt', 'csv', 'xml', 'pdf', 'doc', 'docx', 'xls', 'xlsx',
        'zip',
    ];

    private const BLOCKED_EXTENSIONS = [
        'php', 'php3', 'php4', 'php5', 'phtml', 'phar',
        'html', 'htm', 'js', 'mjs', 'css', 'svg',
        'exe', 'bat', 'cmd', 'com', 'scr', 'ps1', 'sh', 'bash',
        'jar', 'war', 'jsp', 'asp', 'aspx', 'cgi', 'pl', 'py', 'rb',
    ];

    private const MAX_SIZE_KB = [
        'image' => 10240,
        'video' => 102400,
        'audio' => 102400,
        'document' => 20480,
        'archive' => 25600,
        'default' => 10240,
    ];

    private const EXTENSION_GROUPS = [
        'image' => ['jpg', 'jpeg', 'png', 'webp', 'bmp', 'apng', 'avif'],
        'video' => ['mp4', 'mpeg', 'ogg', 'webm', '3gp', 'mov', 'flv', 'avi', 'wmv', 'ts'],
        'audio' => ['mp3', 'wav', 'ogg'],
        'document' => ['txt', 'csv', 'xml', 'pdf', 'doc', 'docx', 'xls', 'xlsx'],
        'archive' => ['zip'],
    ];

    private const MIME_PREFIXES = [
        'image' => ['image/'],
        'video' => ['video/'],
        'audio' => ['audio/'],
    ];

    private const DOCUMENT_MIMES = [
        'text/plain',
        'text/csv',
        'text/xml',
        'application/xml',
        'application/pdf',
        'application/msword',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/zip',
        'application/x-zip',
        'application/x-zip-compressed',
        'application/octet-stream',
    ];

    private const ARCHIVE_MIMES = [
        'application/zip',
        'application/x-zip',
        'application/x-zip-compressed',
        'application/octet-stream',
    ];

    /**
     * Uploading add-ons installs executable code.
     * Keep disabled unless explicitly enabled.
     */
    private const ALLOW_ADDON_ZIP_UPLOADS = false;

    private const ZIP_MAX_FILES = 500;

    private const ZIP_MAX_UNCOMPRESSED_SIZE = 50 * 1024 * 1024;

    public static function validate(UploadedFile $file): ?string
    {
        if (! $file->isValid()) {
            return 'The uploaded file is not valid.';
        }

        $originalName = $file->getClientOriginalName();
        $extension = strtolower($file->getClientOriginalExtension());

        if ($extension === '') {
            return 'Uploaded files must have an allowed extension.';
        }

        if (in_array($extension, self::BLOCKED_EXTENSIONS, true)) {
            return 'This file type is not allowed. ' . $extension;
        }

        if (! in_array($extension, self::ALLOWED_EXTENSIONS, true)) {
            return 'This file type is not allowed. ' . $extension .
                ' Allowed: ' . implode(', ', self::ALLOWED_EXTENSIONS);
        }

        if (self::hasBlockedExtensionSegment($originalName, self::BLOCKED_EXTENSIONS)) {
            return 'File names containing executable extensions are not allowed.';
        }

        if (self::hasUnsafeName($originalName)) {
            return 'The uploaded file name is not allowed.';
        }

        if (
            $extension === 'zip'
            && ! self::ALLOW_ADDON_ZIP_UPLOADS
        ) {
            return 'ZIP uploads are currently disabled.';
        }

        $group = self::extensionGroup($extension);

        $maxKb = self::MAX_SIZE_KB[$group]
            ?? self::MAX_SIZE_KB['default'];

        if (($file->getSize() / 1024) > $maxKb) {
            return "The uploaded file may not be greater than {$maxKb} kilobytes.";
        }

        if (! self::mimeAllowed($file->getMimeType(), $group)) {
            return 'The uploaded file content does not match an allowed file type.'.$file->getMimeType();
        }

        if ($extension === 'zip') {
            return self::validateZipArchive($file->getRealPath());
        }

        return null;
    }

    public static function validateZipArchive(string $path): ?string
    {
        $zip = new ZipArchive();

        if ($zip->open($path) !== true) {
            return 'Unable to open the uploaded ZIP file.';
        }

        $totalSize = 0;

        if ($zip->numFiles > self::ZIP_MAX_FILES) {
            $zip->close();

            return 'The uploaded ZIP contains too many files.';
        }

        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);

            $name = $stat['name'] ?? '';

            if ($name === '' || self::isUnsafeZipEntry($name)) {
                $zip->close();

                return 'The uploaded ZIP contains an unsafe file path.';
            }

            $entryExtension = strtolower(
                pathinfo($name, PATHINFO_EXTENSION)
            );

            if (
                $entryExtension !== ''
                && in_array($entryExtension, self::BLOCKED_EXTENSIONS, true)
            ) {
                $zip->close();

                return "The uploaded ZIP contains a blocked file type: {$entryExtension}.";
            }

            if (
                self::hasBlockedExtensionSegment(
                    basename($name),
                    self::BLOCKED_EXTENSIONS
                )
            ) {
                $zip->close();

                return 'The uploaded ZIP contains a file with a blocked extension segment.';
            }

            $totalSize += (int) ($stat['size'] ?? 0);

            if ($totalSize > self::ZIP_MAX_UNCOMPRESSED_SIZE) {
                $zip->close();

                return 'The uploaded ZIP is too large after extraction.';
            }
        }

        $zip->close();

        return null;
    }

    private static function extensionGroup(string $extension): string
    {
        foreach (self::EXTENSION_GROUPS as $group => $extensions) {
            if (in_array($extension, $extensions, true)) {
                return $group;
            }
        }

        return 'default';
    }

    private static function mimeAllowed(?string $mime, string $group): bool
    {
        if ($mime === null) {
            return false;
        }

        foreach (self::MIME_PREFIXES[$group] ?? [] as $prefix) {
            if (Str::startsWith($mime, $prefix)) {
                return true;
            }
        }

        if ($group === 'document') {
            return in_array($mime, self::DOCUMENT_MIMES, true);
        }

        if ($group === 'archive') {
            return in_array($mime, self::ARCHIVE_MIMES, true);
        }

        return $group === 'default';
    }

    private static function hasBlockedExtensionSegment(
        string $fileName,
        array $blockedExtensions
    ): bool {
        $parts = explode('.', strtolower($fileName));

        array_pop($parts);

        foreach ($parts as $part) {
            if (in_array($part, $blockedExtensions, true)) {
                return true;
            }
        }

        return false;
    }

    private static function hasUnsafeName(string $fileName): bool
    {
        return str_contains($fileName, "\0")
            || str_contains($fileName, '/')
            || str_contains($fileName, '\\')
            || str_contains($fileName, '..');
    }

    private static function isUnsafeZipEntry(string $name): bool
    {
        $normalized = str_replace('\\', '/', $name);

        return str_starts_with($normalized, '/')
            || preg_match('/^[a-zA-Z]:\//', $normalized) === 1
            || str_contains($normalized, '../')
            || str_contains($normalized, '/..')
            || str_contains($normalized, "\0");
    }
}