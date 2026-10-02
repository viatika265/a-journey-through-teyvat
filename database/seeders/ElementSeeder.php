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
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/reactions/anemo.gif',
                'media_type' => 'gif',
            ],

            [
                'name' => 'Geo',
                'slug' => 'geo',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Geo.png',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/reactions/geo.gif',
                'media_type' => 'gif',
            ],

            [
                'name' => 'Electro',
                'slug' => 'electro',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Electro.png',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/reactions/electro.gif',
                'media_type' => 'gif',
            ],

            [
                'name' => 'Dendro',
                'slug' => 'dendro',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Dendro.png',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/reactions/dendro.gif',
                'media_type' => 'gif',
            ],

            [
                'name' => 'Hydro',
                'slug' => 'hydro',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Hydro.png',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/reactions/hydro.gif',
                'media_type' => 'gif',
            ],

            [
                'name' => 'Pyro',
                'slug' => 'pyro',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Pyro.png',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/reactions/pyro.gif',
                'media_type' => 'gif',
            ],

            [
                'name' => 'Cryo',
                'slug' => 'cryo',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/element/Cryo.png',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/reactions/cryo.gif',
                'media_type' => 'gif',
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