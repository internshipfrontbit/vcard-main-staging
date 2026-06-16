<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use ZipArchive;

class UploadSecurity
{
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

        $blockedExtensions = config('app.upload-security.blocked_extensions', []);
        $allowedExtensions = config('app.upload-security.allowed_extensions', []);

        if (in_array($extension, $blockedExtensions, true)) {
            return 'This file type is not allowed2.'. $extension;
        }

        if (! in_array($extension, $allowedExtensions, true)) {
            return 'This file type is not allowed3.' . $extension . ' Allowed: ' . implode(', ', $allowedExtensions);
        }

        if (self::hasBlockedExtensionSegment($originalName, $blockedExtensions)) {
            return 'File names containing executable extensions are not allowed.';
        }

        if (self::hasUnsafeName($originalName)) {
            return 'The uploaded file name is not allowed.';
        }

        $group = self::extensionGroup($extension);
        $maxKb = config("app.upload-security.max_size_kb.$group", config('app.upload-security.max_size_kb.default', 10240));

        if (($file->getSize() / 1024) > $maxKb) {
            return "The uploaded file may not be greater than {$maxKb} kilobytes.";
        }

        if (! self::mimeAllowed($file->getMimeType(), $group)) {
            return 'The uploaded file content does not match an allowed file type.';
        }

        return null;
    }

    public static function validateZipArchive(string $path): ?string
    {
        $zip = new ZipArchive();

        if ($zip->open($path) !== true) {
            return 'Unable to open the uploaded ZIP file.';
        }

        $maxFiles = config('app.upload-security.zip.max_files', 500);
        $maxUncompressedSize = config('app.upload-security.zip.max_uncompressed_size', 50 * 1024 * 1024);
        $totalSize = 0;

        if ($zip->numFiles > $maxFiles) {
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

            $totalSize += (int) ($stat['size'] ?? 0);
            if ($totalSize > $maxUncompressedSize) {
                $zip->close();

                return 'The uploaded ZIP is too large after extraction.';
            }
        }

        $zip->close();

        return null;
    }

    private static function extensionGroup(string $extension): string
    {
        foreach (config('app.upload-security.extension_groups', []) as $group => $extensions) {
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

        foreach (config("app.upload-security.mime_prefixes.$group", []) as $prefix) {
            if (Str::startsWith($mime, $prefix)) {
                return true;
            }
        }

        if ($group === 'document') {
            return in_array($mime, config('app.upload-security.document_mimes', []), true);
        }

        if ($group === 'archive') {
            return in_array($mime, config('app.upload-security.archive_mimes', []), true);
        }

        return $group === 'default';
    }

    private static function hasBlockedExtensionSegment(string $fileName, array $blockedExtensions): bool
    {
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