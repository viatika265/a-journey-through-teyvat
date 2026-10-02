<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Weapon;

class WeaponSeeder extends Seeder
{
    public function run(): void
    {
        $weapons = [
            [
                'name' => 'Sword',
                'slug' => 'sword',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/weapons/Icon_Sword.webp',
            ],
            [
                'name' => 'Claymore',
                'slug' => 'claymore',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/weapons/Icon_Claymore.webp',
            ],
            [
                'name' => 'Polearm',
                'slug' => 'polearm',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/weapons/Icon_Polearm.webp',
            ],
            [
                'name' => 'Bow',
                'slug' => 'bow',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/weapons/Icon_Bow.webp',
            ],
            [
                'name' => 'Catalyst',
                'slug' => 'catalyst',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/weapons/Icon_Catalyst.webp',
            ],
        ];

        foreach ($weapons as $weapon) {
            Weapon::updateOrCreate(
                ['slug' => $weapon['slug']],
                $weapon
            );
        }
    }
}