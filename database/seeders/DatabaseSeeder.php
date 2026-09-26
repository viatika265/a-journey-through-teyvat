<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ElementSeeder::class,
            WeaponSeeder::class,
            ArtifactSeeder::class,
            RegionSeeder::class,
            CharacterSeeder::class,
        ]);
    }
}