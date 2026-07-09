<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'short_description',
        'long_description',
        'benefits',
        'features',
        'image_path',
        'is_active',
        'order',
    ];

    protected $casts = [
        'benefits' => 'array',
        'features' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
