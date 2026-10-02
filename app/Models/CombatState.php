<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CombatState extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function combinationsAsFirstState(): HasMany
    {
        return $this->hasMany(
            ReactionCombination::class,
            'state_1_id'
        );
    }

    public function combinationsAsSecondState(): HasMany
    {
        return $this->hasMany(
            ReactionCombination::class,
            'state_2_id'
        );
    }
}