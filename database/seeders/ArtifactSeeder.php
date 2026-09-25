<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artifact;

class ArtifactSeeder extends Seeder
{
    public function run(): void
    {
        $artifacts = [
            [
                'name' => 'Noblesse Oblige',
                'slug' => 'noblesse-oblige',
                'icon' => 'https://drive.google.com/file/d/1lgXloBvEcKlm_sKBWTJxgkHE-UTvbEWm/view?usp=drive_link',
            ],
            [
                'name' => 'Viridescent Venerer',
                'slug' => 'viridescent-venerer',
                'icon' => 'https://drive.google.com/file/d/19yD1NAl6o7VIJvcV4cLZ0YUEs5E9ggvj/view?usp=drive_link',
            ],
            [
                'name' => 'A Day Carved from Rising Winds',
                'slug' => 'a-day-carved-from-rising-winds',
                'icon' => 'https://drive.google.com/file/d/1-rFUMICby25qweUG-Nzv0vexVRtf-JAP/view?usp=drive_link',
            ],
            [
                'name' => 'Emblem of Severed Fate',
                'slug' => 'emblem-of-severed-fate',
                'icon' => 'https://drive.google.com/file/d/1vTHi2pSV_oRTwQqGm1Cf6f3Q4OslCvK/view?usp=drive_link',
            ],
            [
                'name' => 'Tenacity of the Millelith',
                'slug' => 'tenacity-of-the-millelith',
                'icon' => 'https://drive.google.com/file/d/1yGk5w9Al_U62PkAjS-Q2LJWg387SwF3b/view?usp=drive_link',
            ],
            [
                'name' => 'Crimson Witch of Flames',
                'slug' => 'crimson-witch-of-flames',
                'icon' => 'https://drive.google.com/file/d/1I3vMA31VxTFr3NsbV6oupOOhOTJzL9-h/view?usp=drive_link',
            ],
            [
                'name' => 'Gilded Dreams',
                'slug' => 'gilded-dreams',
                'icon' => 'https://drive.google.com/file/d/1WBgS8IRcY3TyMCQX2EqV1PIfxJKDi9b_/view?usp=drive_link',
            ],
            [
                'name' => 'Desert Pavilion Chronicle',
                'slug' => 'desert-pavilion-chronicle',
                'icon' => 'https://drive.google.com/file/d/1BzmHhBr_MoBageqSXh5EaEblRkall_A_/view?usp=drive_link',
            ],
            [
                'name' => 'Deepwood Memories',
                'slug' => 'deepwood-memories',
                'icon' => 'https://drive.google.com/file/d/13Ul8WNG0KPRhF8siPK9wcDxFDyi5VFmz/view?usp=drive_link',
            ],
            [
                'name' => 'Marechaussee Hunter',
                'slug' => 'marechaussee-hunter',
                'icon' => 'https://drive.google.com/file/d/1XsqXfoZcxggiMv7_-pshACGQJ_-rHM3h/view?usp=drive_link',
            ],
            [
                'name' => 'Golden Troupe',
                'slug' => 'golden-troupe',
                'icon' => 'https://drive.google.com/file/d/1edepcmrsyW_UT-uujjzPCr408Wkz0pZ3/view?usp=drive_link',
            ],
            [
                'name' => 'Obsidian Codex',
                'slug' => 'obsidian-codex',
                'icon' => 'https://drive.google.com/file/d/1R4fTSrL6sqUg9yygnXa_WIGAQ0AZvYJ_/view?usp=drive_link',
            ],
            [
                'name' => 'Scroll of the Hero of the Cinder City',
                'slug' => 'scroll-of-the-hero-of-the-cinder-city',
                'icon' => 'https://drive.google.com/file/d/1Ne16KgnOtGYD4kbkB2wyZzw33Wd_xq42/view?usp=drive_link',
            ],
            [
                'name' => "Night of the Sky's Unveiling",
                'slug' => 'night-of-the-skys-unveiling',
                'icon' => 'https://drive.google.com/file/d/1yJ19uPudL8Z7ps2MeS61GKlMp9n-pHT_/view?usp=drive_link',
            ],
            [
                'name' => "Silken Moon's Serenade",
                'slug' => 'silken-moons-serenade',
                'icon' => 'https://drive.google.com/file/d/1Ll3Iyn6br4KjtOKGDNP9C_2-uSlsGpwx/view?usp=drive_link',
            ],
            [
                'name' => "Nymph's Dream",
                'slug' => 'nymphs-dream',
                'icon' => 'https://drive.google.com/file/d/1fd7M83f5QabpZk3E6zW3X8Xc-ZS5kFPh/view?usp=drive_link',
            ],
            [
                'name' => 'Heart of the Furnace',
                'slug' => 'heart-of-the-furnace',
                'icon' => 'https://drive.google.com/file/d/1HKtAqOiE6xZPBQNQexApKWbJyihgmqtR/view?usp=drive_link',
            ],
        ];

        foreach ($artifacts as $artifact) {
            Artifact::updateOrCreate(
                ['slug' => $artifact['slug']],
                $artifact
            );
        }
    }
}