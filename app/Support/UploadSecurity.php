<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use ZipArchive;

class UploadSecurity
{
    private const ALLOWED_EXTENSIONS = [
        'jpg', 'jpeg', 'png', 'webp', 'bmp', 'apng', 'avif',
        'mp4', 'mpeg', 'webm', '3gp', 'mov', 'flv', 'avi', 'wmv', 'ts',
        'mp3', 'wav', 'ogg',
        'txt', 'csv', 'pdf', 'xls', 'xlsx',
        'zip',
    ];

    private const BLOCKED_EXTENSIONS = [
        'php', 'php3', 'php4', 'php5', 'phtml', 'phar',
        'html', 'htm', 'js', 'mjs', 'css', 'svg',
        'exe', 'bat', 'cmd', 'com', 'scr', 'ps1', 'sh', 'bash',
        'jar', 'war', 'jsp', 'asp', 'aspx', 'cgi', 'pl', 'py', 'rb',
        // Macro-enabled Office formats — blocked due to macro execution risk
        'docm', 'xlsm', 'pptm', 'dotm', 'xltm', 'potm',
    ];

    private const MAX_SIZE_KB = [
        'image'    => 10240,
        'video'    => 102400,
        'audio'    => 102400,
        'document' => 20480,
        'archive'  => 25600,
        'default'  => 10240,
    ];

    private const EXTENSION_GROUPS = [
        // FIX: 'ogg' removed from 'video' — it belongs only in 'audio'
        'image'    => ['jpg', 'jpeg', 'png', 'webp', 'bmp', 'apng', 'avif'],
        'video'    => ['mp4', 'mpeg', 'webm', '3gp', 'mov', 'flv', 'avi', 'wmv', 'ts'],
        'audio'    => ['mp3', 'wav', 'ogg'],
        'document' => ['txt', 'csv', 'pdf', 'xls', 'xlsx'],
        'archive'  => ['zip'],
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
    ];

    /**
     * FIX: Added proper multi-byte signatures for webp, bmp, avif.
     * apng shares the PNG header ('89504E47') and is handled separately in validateMagicNumber().
     *
     * Signature format: hex string of the leading bytes of the file.
     * For webp, bytes 0–3 = "RIFF" AND bytes 8–11 = "WEBP" are both required.
     */
    private const FILE_SIGNATURES = [
        'jpg'  => ['FFD8FF'],
        'jpeg' => ['FFD8FF'],
        'png'  => ['89504E47'],
        'apng' => ['89504E47'],   // apng is a PNG; shares header, extra chunk check optional
        'bmp'  => ['424D'],       // "BM"
        // webp: RIFF header validated separately (needs offset check for "WEBP" at bytes 8–11)
        'pdf'  => ['25504446'],   // "%PDF"
        'zip'  => ['504B0304', '504B0506', '504B0708'],
        // avif: 'ftyp' box at offset 4 with brand 'avif'/'avis'; handled separately below
    ];

    private const ARCHIVE_MIMES = [
        'application/zip',
        'application/x-zip',
        'application/x-zip-compressed',
    ];

    /**
     * Uploading add-ons installs executable code.
     * Keep disabled unless explicitly enabled.
     */
    private const ALLOW_ADDON_ZIP_UPLOADS = false;

    private const ZIP_MAX_FILES = 500;

    private const ZIP_MAX_UNCOMPRESSED_SIZE = 50 * 1024 * 1024; // 50 MB

    // -------------------------------------------------------------------------
    // Magic Number Validation
    // -------------------------------------------------------------------------

    /**
     * FIX: Extended to handle webp (RIFF + WEBP offset check) and avif (ftyp box).
     * Returns true when no signature is registered for the extension (permissive for unknown types).
     */
    private static function validateMagicNumber(string $path, string $extension): bool
    {
        $handle = fopen($path, 'rb');

        if (! $handle) {
            return false;
        }

        $bytes = fread($handle, 32); // Read enough bytes for all checks
        fclose($handle);

        if ($bytes === false || strlen($bytes) === 0) {
            return false;
        }

        $hex = strtoupper(bin2hex($bytes));

        // --- webp: "RIFF" at bytes 0–3, "WEBP" at bytes 8–11 ---
        if ($extension === 'webp') {
            return str_starts_with($hex, '52494646')          // "RIFF"
                && substr($hex, 16, 8) === '57455250';        // "WEBP" at offset 8
        }

        // --- avif: 'ftyp' box at bytes 4–7, brand 'avif' or 'avis' at bytes 8–11 ---
        if ($extension === 'avif') {
            $ftypOffset  = substr($hex, 8, 8);   // bytes 4–7
            $brandOffset = substr($hex, 16, 8);  // bytes 8–11
            return $ftypOffset === '66747970'    // "ftyp"
                && in_array($brandOffset, ['61766966', '61766973'], true); // "avif" or "avis"
        }

        // --- Standard signature lookup ---
        if (! isset(self::FILE_SIGNATURES[$extension])) {
            return true; // No signature registered — pass through
        }

        foreach (self::FILE_SIGNATURES[$extension] as $signature) {
            if (str_starts_with($hex, $signature)) {
                return true;
            }
        }

        return false;
    }

    // -------------------------------------------------------------------------
    // Main Entry Point
    // -------------------------------------------------------------------------

    /**
     * Validate an uploaded file.
     * Returns null on success, or an error string describing the problem.
     */
    public static function validate(UploadedFile $file): ?string
    {
        if (! $file->isValid()) {
            return 'The uploaded file is not valid.';
        }

        $originalName = $file->getClientOriginalName();
        $extension    = strtolower($file->getClientOriginalExtension());

        // --- Extension must exist ---
        if ($extension === '') {
            return 'Uploaded files must have an allowed extension.';
        }

        // --- Explicit blocklist check ---
        if (in_array($extension, self::BLOCKED_EXTENSIONS, true)) {
            return 'This file type is not allowed.';
        }

        // --- Allowlist check ---
        if (! in_array($extension, self::ALLOWED_EXTENSIONS, true)) {
            return 'This file type is not allowed.';
        }

        // --- Double-extension attack check (e.g. shell.php.jpg) ---
        if (self::hasBlockedExtensionSegment($originalName, self::BLOCKED_EXTENSIONS)) {
            return 'File names containing executable extensions are not allowed.';
        }

        // --- Unsafe characters / path traversal in filename ---
        if (self::hasUnsafeName($originalName)) {
            return 'The uploaded file name is not allowed.';
        }

        // --- Hidden / dot files (e.g. .htaccess, .env) ---
        if (self::isDotFile($originalName)) {
            return 'Hidden files are not allowed.';
        }

        // --- ZIP guard ---
        if ($extension === 'zip' && ! self::ALLOW_ADDON_ZIP_UPLOADS) {
            return 'ZIP uploads are currently disabled.';
        }

        // --- Size check ---
        $group = self::extensionGroup($extension);
        $maxKb = self::MAX_SIZE_KB[$group] ?? self::MAX_SIZE_KB['default'];

        if (($file->getSize() / 1024) > $maxKb) {
            return "The uploaded file may not be greater than {$maxKb} kilobytes.";
        }

        // --- MIME type check ---
        $mime = $file->getMimeType();
        if (! self::mimeAllowed($mime, $group)) {
            return 'The uploaded file content does not match an allowed file type.';
        }

        // --- Image integrity check ---
        if ($group === 'image') {
            $imageInfo = @getimagesize($file->getRealPath());

            if ($imageInfo === false) {
                return 'Invalid image file.';
            }
        }

        // --- ZIP content inspection ---
        if ($extension === 'zip') {
            return self::validateZipArchive($file->getRealPath());
        }

        return null;
    }

    // -------------------------------------------------------------------------
    // ZIP Archive Validation
    // -------------------------------------------------------------------------

    public static function validateZipArchive(string $path): ?string
    {
        $zip = new ZipArchive();

        if ($zip->open($path) !== true) {
            return 'Unable to open the uploaded ZIP file.';
        }

        // --- File count limit ---
        if ($zip->numFiles > self::ZIP_MAX_FILES) {
            $zip->close();
            return 'The uploaded ZIP contains too many files.';
        }

        $totalUncompressedSize = 0;

        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);
            $name = $stat['name'] ?? '';

            // --- Empty or unsafe path ---
            if ($name === '' || self::isUnsafeZipEntry($name)) {
                $zip->close();
                return 'The uploaded ZIP contains an unsafe file path.';
            }

            // FIX: Skip directory entries (end with '/') without extension checks
            if (str_ends_with($name, '/')) {
                continue;
            }

            $baseName       = basename($name);
            $entryExtension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            // FIX: Block hidden/dot files inside ZIP (e.g. .htaccess, .env)
            if (self::isDotFile($baseName)) {
                $zip->close();
                return 'The uploaded ZIP contains a hidden file.';
            }

            // FIX: Enforce the ALLOWLIST inside ZIP entries (not just the blocklist)
            if ($entryExtension !== '' && ! in_array($entryExtension, self::ALLOWED_EXTENSIONS, true)) {
                $zip->close();
                return "The uploaded ZIP contains a disallowed file type: {$entryExtension}.";
            }

            // Explicit blocklist as a secondary safety net
            if ($entryExtension !== '' && in_array($entryExtension, self::BLOCKED_EXTENSIONS, true)) {
                $zip->close();
                return "The uploaded ZIP contains a blocked file type: {$entryExtension}.";
            }

            // Double-extension attack inside ZIP (e.g. shell.php.jpg)
            if (self::hasBlockedExtensionSegment($baseName, self::BLOCKED_EXTENSIONS)) {
                $zip->close();
                return 'The uploaded ZIP contains a file with a blocked extension segment.';
            }

            // --- Uncompressed size accumulation ---
            $uncompressedSize = (int) ($stat['size'] ?? 0);
            $compressedSize   = (int) ($stat['comp_size'] ?? 0);

            $totalUncompressedSize += $uncompressedSize;

            if ($totalUncompressedSize > self::ZIP_MAX_UNCOMPRESSED_SIZE) {
                $zip->close();
                return 'The uploaded ZIP is too large after extraction.';
            }

            // --- ZIP bomb: compression ratio guard ---
            if ($compressedSize > 0 && ($uncompressedSize / $compressedSize) > 100) {
                $zip->close();
                return 'ZIP compression ratio is too high (possible ZIP bomb).';
            }
        }

        $zip->close();

        return null;
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

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

    /**
     * Detect double-extension attacks by scanning all non-final segments.
     * e.g. "shell.php.jpg" → segments ["shell", "php"] → "php" is blocked.
     */
    private static function hasBlockedExtensionSegment(
        string $fileName,
        array $blockedExtensions
    ): bool {
        $parts = explode('.', strtolower($fileName));
        array_pop($parts); // Remove the actual final extension

        foreach ($parts as $part) {
            if (in_array($part, $blockedExtensions, true)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Reject filenames with null bytes, path separators, traversal sequences,
     * Windows reserved characters, trailing dots, or whitespace-before-dot patterns.
     */
    private static function hasUnsafeName(string $fileName): bool
    {
        return str_contains($fileName, "\0")
            || str_contains($fileName, '/')
            || str_contains($fileName, '\\')
            || str_contains($fileName, '..')
            || preg_match('/[<>:"|?*]/', $fileName)
            || preg_match('/\s+\./', $fileName)
            || str_ends_with($fileName, '.');
    }

    /**
     * FIX (new): Block hidden/dot files such as .htaccess, .env, .gitignore.
     * Only checks the final filename component, not directory segments in paths.
     */
    private static function isDotFile(string $fileName): bool
    {
        $base = basename($fileName);

        return str_starts_with($base, '.') && $base !== '.' && $base !== '..';
    }

    /**
     * Reject ZIP entries that attempt path traversal or absolute path injection.
     */
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