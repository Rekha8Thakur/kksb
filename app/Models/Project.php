<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'client',
        'project_date',
        'description',
        'challenge',
        'solution',
        'results',
        'technologies_used',
        'main_image',
        'gallery_images',
        'video_url',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'project_date' => 'date',
        'technologies_used' => 'array',
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getMainImageUrlAttribute(): string
    {
        if (empty($this->main_image)) {
            return $this->getDefaultPlaceholder();
        }

        if (str_starts_with($this->main_image, 'http://') || str_starts_with($this->main_image, 'https://')) {
            return $this->main_image;
        }

        // Check if file exists in public/
        if (file_exists(public_path($this->main_image))) {
            return asset($this->main_image);
        }

        // Check if file exists in storage/app/public/
        $cleanStoragePath = str_replace('storage/', '', $this->main_image);
        if (file_exists(storage_path('app/public/' . $cleanStoragePath))) {
            return asset($this->main_image);
        }

        // Fallback
        return $this->getDefaultPlaceholder();
    }

    public function getGalleryImageUrlsAttribute(): array
    {
        if (empty($this->gallery_images)) {
            return $this->getDefaultGalleryPlaceholders();
        }

        $urls = [];
        foreach ($this->gallery_images as $image) {
            if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
                $urls[] = $image;
            } elseif (file_exists(public_path($image))) {
                $urls[] = asset($image);
            } else {
                $cleanStoragePath = str_replace('storage/', '', $image);
                if (file_exists(storage_path('app/public/' . $cleanStoragePath))) {
                    $urls[] = asset($image);
                }
            }
        }

        // If all uploaded files are missing, fall back to placeholders
        if (empty($urls)) {
            return $this->getDefaultGalleryPlaceholders();
        }

        return $urls;
    }

    private function getDefaultPlaceholder(): string
    {
        $placeholders = [
            'the-himalayan-resort' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop',
            'the-cafe-project' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1000&q=80',
            'bhalla-dental-clinic' => 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=1000&q=80',
            'peter-england-solan' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1000&q=80',
        ];

        return $placeholders[$this->slug] ?? 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1000&auto=format&fit=crop';
    }

    private function getDefaultGalleryPlaceholders(): array
    {
        $galleryPlaceholders = [
            'the-himalayan-resort' => [
                'https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=600',
                'https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&w=600'
            ],
            'the-cafe-project' => [
                'https://images.unsplash.com/photo-1498804103079-a6351b050096?q=80&w=600',
                'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=600'
            ],
            'bhalla-dental-clinic' => [
                'https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?q=80&w=600'
            ],
            'peter-england-solan' => [
                'https://images.unsplash.com/photo-1441984969893-c53657968b4f?q=80&w=600'
            ]
        ];

        return $galleryPlaceholders[$this->slug] ?? [];
    }
}
