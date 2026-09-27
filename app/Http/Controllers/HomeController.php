<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Character;

class HomeController extends Controller
{
    public function index()
    {
        $regions = Region::all();

        $characters = Character::whereNotNull('additional_image')
            ->where('additional_image', '!=', '')
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('home', compact('regions', 'characters'));
    }
}