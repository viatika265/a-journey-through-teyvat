<?php

namespace App\Models;

use App\Models\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'element',
        'description',
        'landmark',
        'image_path',
    ];

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}