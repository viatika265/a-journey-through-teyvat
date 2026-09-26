<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class HomeController extends Controller
{
    public function index(){
            $regionData = Region::all();
            $regions = [
            [
                'name' => 'Mondstadt',
                'x' => 4353, // Ganti dengan hasil klik ganda di console
                'y' => 2846,
                'color' => '#429C99', // Warna hex pin Mondstadt
                'emblem' => $regionData->firstWhere('name', 'Mondstadt')->icon, 
            ],
            [
                'name' => 'Liyue',
                'x' => 4068, 
                'y' => 3684, 
                'color' => '#E4BF18',
                'emblem' => $regionData->firstWhere('name', 'Liyue')->icon,
            ],
            [
                'name' => 'Inazuma',
                'x' => 5000, 
                'y' => 4500, 
                'color' => '#42339C', // Contoh warna ungu
                'emblem' => $regionData->firstWhere('name', 'Inazuma')->icon
            ],
            [
                'name' => 'Sumeru',
                'x' => 3333, 
                'y' => 3789, 
                'color' => '#1F6B32', // Contoh warna hijau
                'emblem' => $regionData->firstWhere('name', 'Sumeru')->icon
            ],
            [
                'name' => 'Fontaine',
                'x' => 3073, 
                'y' => 2555, 
                'color' => '#0666D3', // Contoh warna biru
                'emblem' => $regionData->firstWhere('name', 'Fontaine')->icon
            ],
            [
                'name' => 'Natlan',
                'x' => 1827, 
                'y' => 4010, 
                'color' => '#A32D1F', // Contoh warna oranye
                'emblem' => $regionData->firstWhere('name', 'Natlan')->icon
            ],
            [
                'name' => 'Snezhnaya',
                'x' => 2483, 
                'y' => 1198, 
                'color' => '#84C4D0', // Contoh warna abu-abu
                'emblem' => $regionData->firstWhere('name', 'Snezhnaya')->icon
            ],
            [
                'name' => 'Nodkrai',
                'x' => 1651, 
                'y' => 2914, 
                'color' => '#131536', // Contoh warna merah gelap
                'emblem' => $regionData->firstWhere('name', 'Nod-Krai')->icon

            ],
        ];
        return view('home', compact('regions'));
        
    }
}
