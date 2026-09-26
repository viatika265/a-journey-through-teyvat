<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'element_id',
        'weapon_id',
        'artifact_id',
        'name',
        'description',
        'character_image',
        'additional_image',
        'sort_order',
        'is_featured',
    ];
}