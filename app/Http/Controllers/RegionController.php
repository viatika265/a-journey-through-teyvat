<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function visited($slug) {
        $region = Region::with([
          'characters.element',
          'characters.weapon',
          'characters.artifact',
        ])
        ->where('slug', $slug)
        ->firstOrFail();

        return view('region', compact('region'));
    }
}
