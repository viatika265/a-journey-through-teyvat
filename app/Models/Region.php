<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $table = 'regions';

    public function element()
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