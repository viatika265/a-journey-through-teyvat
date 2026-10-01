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
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Anemo.png',
            ],
            [
                'name' => 'Geo',
                'slug' => 'geo',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Geo.png',
            ],
            [
                'name' => 'Electro',
                'slug' => 'electro',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Electro.png',
            ],
            [
                'name' => 'Dendro',
                'slug' => 'dendro',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Dendro.png',
            ],
            [
                'name' => 'Hydro',
                'slug' => 'hydro',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Hydro.png',
            ],
            [
                'name' => 'Pyro',
                'slug' => 'pyro',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Pyro.png',
            ],
            [
                'name' => 'Cryo',
                'slug' => 'cryo',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Cryo.png',
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