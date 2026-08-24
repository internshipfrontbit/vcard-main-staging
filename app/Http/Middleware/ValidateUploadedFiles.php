<?php

namespace App\Http\Middleware;

use App\Support\UploadSecurity;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ValidateUploadedFiles
{
    public function handle(Request $request, Closure $next): Response
    {
        foreach ($request->allFiles() as $key => $file) {
            $message = $this->validateFile($file);

            if ($message !== null) {
                throw ValidationException::withMessages([$key => $message]);
            }
        }

        return $next($request);
    }

    private function validateFile(mixed $file): ?string
    {
        if ($file instanceof UploadedFile) {
            return UploadSecurity::validate($file);
        }

        if (is_array($file)) {
            foreach ($file as $nestedFile) {
                $message = $this->validateFile($nestedFile);

                if ($message !== null) {
                    return $message;
                }
            }
        }

        return null;
    }
}