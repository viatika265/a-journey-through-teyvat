<?php

namespace App\Http\Controllers;

use App\Models\Region;

class HomeController extends Controller
{
    public function index()
    {
        $regions = Region::all();

        return view('home', compact('regions'));
    }
}