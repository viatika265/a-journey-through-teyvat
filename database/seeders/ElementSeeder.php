<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Element;

class ElementSeeder extends Seeder
{
    public function run(): void
    {
        $elements = [
            [
                'name' => 'Anemo',
                'slug' => 'anemo',
                'icon' => 'https://drive.google.com/file/d/1Ul6sFA3B4zaYjePhL3LJLIJ12ARiF3rN/view?usp=drive_link',
            ],
            [
                'name' => 'Geo',
                'slug' => 'geo',
                'icon' => 'https://drive.google.com/file/d/1JO_s8x1THcsoChPJhfBTGL2H5lYkq3G5/view?usp=drive_link',
            ],
            [
                'name' => 'Electro',
                'slug' => 'electro',
                'icon' => 'https://drive.google.com/file/d/1ni9vKBaQXcuJQrdxrSEuXQ2dXJop0eOm/view?usp=drive_link',
            ],
            [
                'name' => 'Dendro',
                'slug' => 'dendro',
                'icon' => 'https://drive.google.com/file/d/12vNhzVtXdQzaStusWv_a7zd1W_OnQL50/view?usp=drive_link',
            ],
            [
                'name' => 'Hydro',
                'slug' => 'hydro',
                'icon' => 'https://drive.google.com/file/d/1CkpKPgPuj97K8X9Yc-lO0sk-pSmbVi6_/view?usp=drive_link',
            ],
            [
                'name' => 'Pyro',
                'slug' => 'pyro',
                'icon' => 'https://drive.google.com/file/d/10WixJYUh4cZa7OLEtD2AxCId1LvTtvfO/view?usp=drive_link',
            ],
            [
                'name' => 'Cryo',
                'slug' => 'cryo',
                'icon' => 'https://drive.google.com/file/d/1PdzEAByhKGmeu6YkV7nmAWJswRm-fHMO/view?usp=drive_link',
            ],
        ];

        foreach ($elements as $element) {
            Element::updateOrCreate(
                ['slug' => $element['slug']],
                $element
            );
        }
    }
}