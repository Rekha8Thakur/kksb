<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    /**
     * Upload and optimize an image (convert to WebP, compress, resize if needed).
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param int|null $maxWidth
     * @param int $quality
     * @return string Path to the stored file relative to public disk
     */
    public static function uploadAndOptimize(UploadedFile $file, string $directory = 'uploads', ?int $maxWidth = 1200, int $quality = 80): string
    {
        // Generate a unique filename with .webp extension
        $filename = Str::random(20) . '.webp';
        $fullDirectoryPath = storage_path('app/public/' . $directory);

        // Ensure directory exists
        if (!file_exists($fullDirectoryPath)) {
            mkdir($fullDirectoryPath, 0755, true);
        }

        $destinationPath = $fullDirectoryPath . '/' . $filename;

        // Try WebP conversion using GD library
        if (function_exists('imagewebp') && function_exists('imagecreatefromstring')) {
            try {
                $imageContent = file_get_contents($file->getRealPath());
                $image = imagecreatefromstring($imageContent);

                if ($image !== false) {
                    // Get original dimensions
                    $width = imagesx($image);
                    $height = imagesy($image);

                    // Resize if maxWidth is specified and image is larger
                    if ($maxWidth && $width > $maxWidth) {
                        $newWidth = $maxWidth;
                        $newHeight = (int) ($height * ($maxWidth / $width));

                        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

                        // Preserve transparency
                        imagealphablending($resizedImage, false);
                        imagesavealpha($resizedImage, true);

                        imagecopyresampled(
                            $resizedImage,
                            $image,
                            0, 0, 0, 0,
                            $newWidth, $newHeight,
                            $width, $height
                        );

                        // Save as webp
                        imagewebp($resizedImage, $destinationPath, $quality);
                        imagedestroy($resizedImage);
                    } else {
                        // Save original size as webp
                        imagewebp($image, $destinationPath, $quality);
                    }

                    imagedestroy($image);

                    return 'storage/' . $directory . '/' . $filename;
                }
            } catch (\Exception $e) {
                // If anything fails in GD processing, fall back to direct saving below
            }
        }

        // Fallback: Save original file without processing if GD is missing or fails
        $originalExt = $file->getClientOriginalExtension();
        $fallbackFilename = Str::random(20) . '.' . $originalExt;
        $path = $file->storeAs('public/' . $directory, $fallbackFilename);
        
        return Storage::url($path);
    }
}
