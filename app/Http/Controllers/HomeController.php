<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class HomeController extends Controller
{
    public function index(){
        $regions = Region::all();
        $coordinates = [
            'Mondstadt'=> [
                'x' => 4353, // Ganti dengan hasil klik ganda di console
                'y' => 2846,
                'color' => '#429C99', // Warna hex pin Mondstadt
                'gradients'=> 'linear-gradient(180deg, #32C4F7 0%, #3EADDD 39%, #429C99 65%, #0E597A 100%)', // Contoh gradient
            ],
            'Liyue'=> [
                'x' => 4068, 
                'y' => 3684, 
                'color' => '#E4BF18',
                'gradients'=> 'linear-gradient(180deg, #E7A481 0%, #CF9160 50%, #A5734D 75%, #5F3B1F 100%)', // Contoh gradient
            ],
            'Inazuma'=> [
                'x' => 5000, 
                'y' => 4500, 
                'color' => '#42339C', // Contoh warna ungu
                'gradients'=> 'linear-gradient(180deg, #F6BFF6 0%, #DC92C1 50%, #CB8CB5 75%, #A46F91 100%)',
            ],
            'Sumeru'=> [
                'x' => 3333, 
                'y' => 3789, 
                'color' => '#1F6B32', // Contoh warna hijau
                'gradients'=> 'linear-gradient(180deg, #63BCFE 0%, #50A5DB 35%, #2E6A76 63%, #638B57 100%)',
            ],
            'Fontaine'=> [
                'x' => 3073, 
                'y' => 2555, 
                'color' => '#0666D3', // Contoh warna biru
                'gradients'=> 'linear-gradient(180deg, #85C6FA 17%, #6194D6 42%, #36A3B1 63%, #639890 83%)',
            ],
            'Natlan'=> [
                'x' => 1827, 
                'y' => 4010, 
                'color' => '#A32D1F', // Contoh warna oranye
                'gradients'=> 'linear-gradient(180deg, #FEC9BF 0%, #98525B 50%, #324144 91%)',
            ],
            'Snezhnaya'=> [
                'x' => 2483, 
                'y' => 1198, 
                'color' => '#84C4D0', // Contoh warna abu-abu
                'gradients'=> 'linear-gradient(180deg, #1F67CD 8%, #C0E1FF 34%, #4379C6 50%, #103467 100%)',
            ],
            'Nod-Krai'=> [
                'x' => 1651, 
                'y' => 2914, 
                'color' => '#131536', // Contoh warna merah gelap
                'gradients'=> 'linear-gradient(180deg, #032C6E 13%, #AA9148 40%, #002595 75%, #000281 100%)',
            ],
        ];

        $regions = $regions->map(function ($region) use ($coordinates) {
            
            return [
                'name' => $region->name,
                'short_description' => $region->short_description,
                'card_image' => $region->card_image,
                'icon' => $region->icon,
                'emblem' => $region->icon,

                // Masukkan icon element yang sudah dikonversi
                'element_icon' => $region->element->icon ?? null,
                'element_name' => $region->element->name ?? null,

                // masukkan archon 
                'archon_icon' => $region->archon_icon ?? null,

                'x' => $coordinates[$region->name]['x'],
                'y' => $coordinates[$region->name]['y'],
                'color' => $coordinates[$region->name]['color'],
                'gradients' => $coordinates[$region->name]['gradients'],

            ];
        });
        return view('home', compact('regions'));
    }         
                
}

                

