<?php

namespace App\Models;

use App\Models\Character;
use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Element extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];


    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }


    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }


    public function reactionCombinationsAsFirstElement(): HasMany
    {
        return $this->hasMany(
            ReactionCombination::class,
            'element_1_id'
        );
    }


    public function reactionCombinationsAsSecondElement(): HasMany
    {
        return $this->hasMany(
            ReactionCombination::class,
            'element_2_id'
        );
    }

}