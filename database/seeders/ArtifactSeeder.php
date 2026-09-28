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
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Noblesse%20Oblige.webp',
            ],
            [
                'name' => 'Viridescent Venerer',
                'slug' => 'viridescent-venerer',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Viridescent%20Venerer.webp',
            ],
            [
                'name' => 'A Day Carved from Rising Winds',
                'slug' => 'a-day-carved-from-rising-winds',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_A%20Day%20Carved%20from%20Rising%20Winds.webp',
            ],
            [
                'name' => 'Emblem of Severed Fate',
                'slug' => 'emblem-of-severed-fate',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Emblem%20of%20Severed%20Fate.webp',
            ],
            [
                'name' => 'Tenacity of the Millelith',
                'slug' => 'tenacity-of-the-millelith',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Tenacity%20of%20the%20Millelith.webp',
            ],
            [
                'name' => 'Crimson Witch of Flames',
                'slug' => 'crimson-witch-of-flames',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Crimson%20Witch%20of%20Flames.webp',
            ],
            [
                'name' => 'Gilded Dreams',
                'slug' => 'gilded-dreams',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Piece%20Gilded%20Dreams.webp',
            ],
            [
                'name' => 'Desert Pavilion Chronicle',
                'slug' => 'desert-pavilion-chronicle',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Desert%20Pavilion%20Chronicle.webp',
            ],
            [
                'name' => 'Deepwood Memories',
                'slug' => 'deepwood-memories',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Deepwood%20Memories.webp',
            ],
            [
                'name' => 'Marechaussee Hunter',
                'slug' => 'marechaussee-hunter',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Marechaussee%20Hunter.webp',
            ],
            [
                'name' => 'Golden Troupe',
                'slug' => 'golden-troupe',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Golden%20Troupe.webp',
            ],
            [
                'name' => 'Obsidian Codex',
                'slug' => 'obsidian-codex',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Obsidian%20Codex.webp',
            ],
            [
                'name' => 'Scroll of the Hero of the Cinder City',
                'slug' => 'scroll-of-the-hero-of-the-cinder-city',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Scroll%20of%20the%20Hero%20of%20the%20Cinder%20City.webp',
            ],
            [
                'name' => "Night of the Sky's Unveiling",
                'slug' => 'night-of-the-skys-unveiling',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Night%20of%20the%20Skys%20Unveiling.webp',
            ],
            [
                'name' => "Silken Moon's Serenade",
                'slug' => 'silken-moons-serenade',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Silken%20Moons%20Serenade.webp',
            ],
            [
                'name' => "Nymph's Dream",
                'slug' => 'nymphs-dream',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Nymphs%20Dream.webp',
            ],
            [
                'name' => 'Heart of the Furnace',
                'slug' => 'heart-of-the-furnace',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/artifacts/Artefak_Heart%20of%20the%20Furnace.webp',
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