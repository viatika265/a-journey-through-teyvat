<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            [
                'name' => 'Mondstadt',
                'slug' => 'mondstadt',
            ],
            [
                'name' => 'Liyue',
                'slug' => 'liyue',
            ],
            [
                'name' => 'Inazuma',
                'slug' => 'inazuma',
            ],
            [
                'name' => 'Sumeru',
                'slug' => 'sumeru',
            ],
            [
                'name' => 'Fontaine',
                'slug' => 'fontaine',
            ],
            [
                'name' => 'Natlan',
                'slug' => 'natlan',
            ],
            [
                'name' => 'Nod',
                'slug' => 'nod',
            ],
            [
                'name' => 'Snezhnaya',
                'slug' => 'snezhnaya',
            ],
        ];

        foreach ($regions as $region) {
            Region::updateOrCreate(
                ['slug' => $region['slug']],
                $region
            );
        }
    }
}