<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestScene extends Model
{
    protected $fillable = [
        'quest_id',
        'title',
        'text',
        'media_url',
        'media_type',
        'order',
    ];

    public function quest(): BelongsTo
    {
        return $this->belongsTo(Quest::class);
    }
}