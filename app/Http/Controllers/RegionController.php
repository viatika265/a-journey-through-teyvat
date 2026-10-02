<?php

namespace App\Http\Controllers;

use App\Models\Region;

class RegionController extends Controller
{
    public function show(string $slug)
    {
        $region = Region::with([
            'characters.element',
            'characters.weapon',
            'characters.artifact',
        ])->where('slug', $slug)->firstOrFail();

        return view('region', compact('region'));
    }

    public function visited($slug)
    {
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