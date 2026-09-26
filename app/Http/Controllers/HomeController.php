<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

            $regions = [
            [
                'name' => 'Mondstadt',
                'x' => 4353, // Ganti dengan hasil klik ganda di console
                'y' => 2846,
                'color' => '#429C99', // Warna hex pin Mondstadt
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
                'color' => '#42339C', // Contoh warna ungu
                'emblem' => 'inazuma-emblem.png'
            ],
            [
                'name' => 'Sumeru',
                'x' => 3333, 
                'y' => 3789, 
                'color' => '#1F6B32', // Contoh warna hijau
                'emblem' => 'sumeru-emblem.png'
            ],
            [
                'name' => 'Fontaine',
                'x' => 3073, 
                'y' => 2555, 
                'color' => '#0666D3', // Contoh warna biru
                'emblem' => 'fontaine-emblem.png'
            ],
            [
                'name' => 'Natlan',
                'x' => 1827, 
                'y' => 4010, 
                'color' => '#A32D1F', // Contoh warna oranye
                'emblem' => 'natlan-emblem.png'
            ],
            [
                'name' => 'Snezhnaya',
                'x' => 2483, 
                'y' => 1198, 
                'color' => '#84C4D0', // Contoh warna abu-abu
                'emblem' => 'snezhnaya-emblem.png'
            ],
            [
                'name' => 'Nodkrai',
                'x' => 1651, 
                'y' => 2914, 
                'color' => '#131536', // Contoh warna merah gelap
                'emblem' => 'nodkrai-emblem.png'

            ],
        ];
        return view('home', compact('regions'));
        
    }
}
