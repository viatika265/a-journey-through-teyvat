<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title',
        'short_description',
        'long_description',
        'card_image',
        'background_image',
        'landmark_image',
        'icon',
        'archon_icon',
        'element_id',
    ];

    protected $table = 'regions';

    public function element(): BelongsTo
    {
        return $this->belongsTo(Element::class, 'element_id');
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function quests(): HasMany
    {
        return $this->hasMany(Quest::class);
    }
}