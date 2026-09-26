<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

            $regions = [
            [
                'name' => 'Mondstadt',
                'x' => 1250, // Ganti dengan hasil klik ganda di console
                'y' => 1840,
                'color' => '#54A88E', // Warna hex pin Mondstadt
                'emblem' => 'mondstadt-emblem.png'
            ],
            [
                'name' => 'Liyue',
                'x' => 4068, 
                'y' => 3684, 
                'color' => '#E4BF18',
                'emblem' => 'liyue_emblem.png'
            ],
            [
                'name' => 'Inazuma',
                'x' => 5000, 
                'y' => 4500, 
                'color' => '#6A5ACD', // Contoh warna ungu
                'emblem' => 'inazuma-emblem.png'
            ],
            [
                'name' => 'Sumeru',
                'x' => 3000, 
                'y' => 2000, 
                'color' => '#228B22', // Contoh warna hijau
                'emblem' => 'sumeru-emblem.png'
            ],
            [
                'name' => 'Fontaine',
                'x' => 4000, 
                'y' => 1000, 
                'color' => '#1E90FF', // Contoh warna biru
                'emblem' => 'fontaine-emblem.png'
            ],
            [
                'name' => 'Natlan',
                'x' => 2000, 
                'y' => 3000, 
                'color' => '#FF4500', // Contoh warna oranye
                'emblem' => 'natlan-emblem.png'
            ],
            [
                'name' => 'Snezhnaya',
                'x' => 1000, 
                'y' => 500, 
                'color' => '#B0C4DE', // Contoh warna abu-abu
                'emblem' => 'snezhnaya-emblem.png'
            ],
        ];
        return view('home', compact('regions'));
        
    }
}
