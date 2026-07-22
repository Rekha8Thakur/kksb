<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinApplication extends Model
{
    use HasFactory;

    protected $table = 'join_applications';

    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'social_link',
        'resume_link',
        'position',
        'message',
        'status',
    ];
}
