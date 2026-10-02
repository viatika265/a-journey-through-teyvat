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
    protected $table = 'regions';

    public function element()
    {
        return $this->belongsTo(Element::class, 'element_id');
    }
    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

}