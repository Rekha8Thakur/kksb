<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CareerJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'type',
        'description',
        'requirements',
        'benefits',
        'is_active',
        'closes_at',
    ];

    protected $casts = [
        'requirements' => 'array',
        'benefits' => 'array',
        'is_active' => 'boolean',
        'closes_at' => 'date',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(CareerApplication::class);
    }
}
