<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'media_url',
        'type',
        'order'
    ];
}