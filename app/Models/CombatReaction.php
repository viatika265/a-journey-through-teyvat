<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CombatReaction extends Model
{
        protected $fillable = [
            'name',
            'category',
            'description',
            'media_url',
            'media_type',
            'order',
            'is_active',
        ];

    public function combinations(): HasMany
    {
        return $this->hasMany(ReactionCombination::class, 'reaction_id');
    }
}