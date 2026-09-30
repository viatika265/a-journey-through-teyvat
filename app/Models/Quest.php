<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quest extends Model
{
    protected $fillable = [
        'region_id',
        'title',
        'type',
        'description',
        'thumbnail_url',
        'order',
        'is_active',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function scenes(): HasMany
    {
        return $this->hasMany(QuestScene::class)
            ->orderBy('order');
    }
}