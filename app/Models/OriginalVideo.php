<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginalVideo extends Model
{
    use HasFactory;

    protected $table = 'original_videos';

    protected $fillable = [
        'title',
        'description',
        'video_url',
        'platform',
        'thumbnail_path',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}
