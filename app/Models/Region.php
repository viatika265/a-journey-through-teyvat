<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    public function element()
    {
        return $this->belongsTo(Element::class, 'element_id');
    }

}

