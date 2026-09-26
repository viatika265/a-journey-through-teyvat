<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
