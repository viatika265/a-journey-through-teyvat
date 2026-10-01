<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameplayExperience extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'media_url',
        'media_type',
        'order',
        'is_active',
    ];
}