<?php

return [
    /*
     * This guard runs before controllers and form requests. Keep this list
     * intentionally small: uploaded files should be opt-in, not opt-out.
     */
    'allowed_extensions' => [
        'jpg', 'jpeg', 'png', 'webp', 'bmp', 'apng', 'avif',
        'mp4', 'mpeg', 'ogg', 'webm', '3gp', 'mov', 'flv', 'avi', 'wmv', 'ts',
        'mp3', 'wav',
        'txt', 'csv', 'xml', 'pdf', 'doc', 'docx', 'xls', 'xlsx',
        'zip',
    ],

    'blocked_extensions' => [
        'php', 'php3', 'php4', 'php5', 'phtml', 'phar',
        'html', 'htm', 'js', 'mjs', 'css', 'svg',
        'exe', 'bat', 'cmd', 'com', 'scr', 'ps1', 'sh', 'bash',
        'jar', 'war', 'jsp', 'asp', 'aspx', 'cgi', 'pl', 'py', 'rb',
    ],

    'max_size_kb' => [
        'image' => 10240,
        'video' => 102400,
        'audio' => 102400,
        'document' => 20480,
        'archive' => 25600,
        'default' => 10240,
    ],

    'extension_groups' => [
        'image' => ['jpg', 'jpeg', 'png', 'webp', 'bmp', 'apng', 'avif'],
        'video' => ['mp4', 'mpeg', 'ogg', 'webm', '3gp', 'mov', 'flv', 'avi', 'wmv', 'ts'],
        'audio' => ['mp3', 'wav', 'ogg'],
        'document' => ['txt', 'csv', 'xml', 'pdf', 'doc', 'docx', 'xls', 'xlsx'],
        'archive' => ['zip'],
    ],

    'mime_prefixes' => [
        'image' => ['image/'],
        'video' => ['video/'],
        'audio' => ['audio/'],
    ],

    'document_mimes' => [
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
    ],

    'archive_mimes' => [
        'application/zip',
        'application/x-zip',
        'application/x-zip-compressed',
        'application/octet-stream',
    ],

    /*
     * Uploading add-ons installs executable code. Keep disabled in production
     * unless the deployment process explicitly enables it for trusted admins.
     */
    'allow_addon_zip_uploads' => env('ALLOW_ADDON_ZIP_UPLOADS', false),

    'zip' => [
        'max_files' => 500,
        'max_uncompressed_size' => 50 * 1024 * 1024,
    ],
];