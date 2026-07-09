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
}
