<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bio', 'avatar', 'social_links'];

    protected $casts = [
        'social_links' => 'array',
    ];

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
