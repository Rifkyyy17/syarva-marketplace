<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    private const ALLOWED_MIME = ['image/jpeg', 'image/png', 'image/webp'];

    private const ALLOWED_EXT = ['jpg', 'jpeg', 'png', 'webp'];

    private const MAX_SIZE = 5120;

    private const MAX_DIMENSION = 1920;

    private const QUALITY = 80;

    public function validate(UploadedFile $file, bool $throw = true): bool
    {
        $valid = in_array($file->getMimeType(), self::ALLOWED_MIME, true)
            && in_array(strtolower($file->getClientOriginalExtension()), self::ALLOWED_EXT, true)
            && $file->getSize() <= self::MAX_SIZE * 1024;

        if (! $valid && $throw) {
            abort(422, 'File harus berupa gambar JPG, PNG, atau WebP dengan ukuran maksimal '.self::MAX_SIZE.' KB.');
        }

        return $valid;
    }

    public function upload(UploadedFile $file, string $directory = 'listings'): string
    {
        $this->validate($file);

        $extension = strtolower($file->getClientOriginalExtension());
        $filename = Str::uuid().'.'.$extension;

        $path = Storage::disk('public')->putFileAs($directory, $file, $filename);

        $fullPath = Storage::disk('public')->path($path);
        $this->optimize($fullPath, $extension);

        return $path;
    }

    public function uploadMany(array $files, string $directory = 'listings'): array
    {
        return array_map(fn (UploadedFile $file) => $this->upload($file, $directory), $files);
    }

    public function delete(string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    private function optimize(string $fullPath, string $extension): void
    {
        if (! extension_loaded('gd')) {
            return;
        }

        $image = match ($extension) {
            'png' => @imagecreatefrompng($fullPath),
            'webp' => @imagecreatefromwebp($fullPath),
            default => @imagecreatefromjpeg($fullPath),
        };

        if (! $image) {
            return;
        }

        $width = imagesx($image);
        $height = imagesy($image);

        if ($width <= self::MAX_DIMENSION && $height <= self::MAX_DIMENSION) {
            imagedestroy($image);

            return;
        }

        $ratio = min(self::MAX_DIMENSION / $width, self::MAX_DIMENSION / $height);
        $newWidth = (int) round($width * $ratio);
        $newHeight = (int) round($height * $ratio);

        $resized = imagecreatetruecolor($newWidth, $newHeight);

        if ($extension === 'png') {
            imagealphablending($resized, false);
            imagesavealpha($resized, true);
        }

        imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        match ($extension) {
            'png' => imagepng($resized, $fullPath, 8),
            'webp' => imagewebp($resized, $fullPath, self::QUALITY),
            default => imagejpeg($resized, $fullPath, self::QUALITY),
        };

        imagedestroy($image);
        imagedestroy($resized);
    }
}