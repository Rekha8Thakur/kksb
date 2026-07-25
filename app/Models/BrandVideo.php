<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandVideo extends Model
{
    use HasFactory;

    protected $table = 'brand_videos';

    protected $fillable = [
        'title',
        'video_url',
        'platform',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}
