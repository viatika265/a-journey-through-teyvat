<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReactionCombination extends Model
{
    protected $fillable = [
        'reaction_id',
        'element_1_id',
        'element_2_id',
        'state_1_id',
        'state_2_id',
        'trigger_type',
        'order',
    ];

    public function reaction(): BelongsTo
    {
        return $this->belongsTo(
            CombatReaction::class,
            'reaction_id'
        );
    }

    public function elementOne(): BelongsTo
    {
        return $this->belongsTo(
            Element::class,
            'element_1_id'
        );
    }

    public function elementTwo(): BelongsTo
    {
        return $this->belongsTo(
            Element::class,
            'element_2_id'
        );
    }

    public function stateOne(): BelongsTo
    {
        return $this->belongsTo(
            CombatState::class,
            'state_1_id'
        );
    }

    public function stateTwo(): BelongsTo
    {
        return $this->belongsTo(
            CombatState::class,
            'state_2_id'
        );
    }
}