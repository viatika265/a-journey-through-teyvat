<?php

namespace App\Http\Controllers;

use App\Models\Region;

class RegionController extends Controller
{
    public function show(string $slug)
    {
        $region = Region::where('slug', $slug)->firstOrFail();

        $characters = $region->characters;

        return view('region', compact(
            'region',
            'characters'
        ));
    }
}