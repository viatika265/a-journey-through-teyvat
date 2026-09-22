<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    public function run(): void
    {
        $characters = [
            'mondstadt' => [
                'Durin',
                'Venti',
                'Lohen',
            ],

            'liyue' => [
                'Yelan',
                'Zhongli',
                'Hu Tao',
            ],

            'inazuma' => [
                'Yae Miko',
                'Raiden Shogun',
                'Kaedehara Kazuha',
            ],

            'sumeru' => [
                'Wanderer',
                'Nahida',
                'Alhaitham',
            ],

            'fontaine' => [
                'Neuvillette',
                'Furina',
                'Wriothesley',
            ],

            'natlan' => [
                'Kinich',
                'Mavuika',
                'Citlali',
            ],

            'nod-krai' => [
                'Nefer',
                'Columbina',
                'Flins',
            ],

            'snezhnaya' => [
                'Tartaglia',
                'Vodyanitsa',
                'Odette',
            ],
        ];

        foreach ($characters as $regionSlug => $names) {
            $region = Region::where('slug', $regionSlug)
                ->firstOrFail();

            foreach ($names as $name) {
                $slug = str($name)->slug()->toString();

                Character::updateOrCreate(
                    ['slug' => $slug],
                    [
                        'region_id' => $region->id,
                        'name' => $name,
                    ]
                );
            }
        }
    }
}