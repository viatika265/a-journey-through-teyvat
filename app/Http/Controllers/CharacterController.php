<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = [
            [
                'name' => 'Durin',
                'description' => 'A mysterious entity connected to the deep history and legends of Mondstadt, bearing an ancient power.',
                'element' => 'anemo.png',
                'weapon' => 'Bow.png',
                'artifact' => 'Viridescent Venerer.png',
                'image' => 'Durin_Mondstadt.png',
            ],
            [
                'name' => 'Venti',
                'description' => 'A bard that seems to have drifted in from nowhere. Sometimes singing songs as old as the hills, and other times fresh new city tunes.',
                'element' => 'anemo.png',
                'weapon' => 'Bow.png',
                'artifact' => 'Viridescent Venerer.png',
                'image' => 'Venti_Mondstadt 1.png',
            ],
            [
                'name' => 'Lohen',
                'description' => 'A steadfast knight of Mondstadt known for exceptional combat skills and unwavering loyalty.',
                'element' => 'anemo.png',
                'weapon' => 'Bow.png',
                'artifact' => 'Viridescent Venerer.png',
                'image' => 'Lohen_Mondstadt.png',
            ],
        ];

        return view('home', compact('characters'));
    }
}
