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
                'icon' => 'https://drive.google.com/file/d/1NZWy9kL-bNgMqKF7HDckg2nynOONcGAs/view?usp=drive_link',
            ],
            [
                'name' => 'Claymore',
                'slug' => 'claymore',
                'icon' => 'https://drive.google.com/file/d/1QFZcahHkM4OJB8PtqLPynyq7fmCPSa4j/view?usp=drive_link',
            ],
            [
                'name' => 'Polearm',
                'slug' => 'polearm',
                'icon' => 'https://drive.google.com/file/d/1B-otBIaGMIaoxj2j6X-Z4ZYCI4eyuNfc/view?usp=drive_link',
            ],
            [
                'name' => 'Bow',
                'slug' => 'bow',
                'icon' => 'https://drive.google.com/file/d/1Z4dg1vR3Ej9pO1zUX7uL94YJNgSBEQ7l/view?usp=drive_link',
            ],
            [
                'name' => 'Catalyst',
                'slug' => 'catalyst',
                'icon' => 'https://drive.google.com/file/d/1aqg4Bh3I2JVJHJcYWiGxW9hP5aAO8c3C/view?usp=drive_link',
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