<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GameplayExperience;

class GameplayExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'title' => 'Explore',
                'slug' => 'explore',
                'description' => 'Discover the vast world of Teyvat and its diverse landscapes.',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/explore/open-world/openworld.gif',
                'media_type' => 'gif',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Running',
                'slug' => 'running',
                'description' => 'Run through the beautiful landscapes of Teyvat and explore the world around you.',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/explore/running/running.gif',
                'media_type' => 'gif',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Climbing',
                'slug' => 'climbing',
                'description' => 'Climb mountains, cliffs, and other places to discover new paths.',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/explore/climbing/memanjat.gif',
                'media_type' => 'gif',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Swimming',
                'slug' => 'swimming',
                'description' => 'Swim through the waters of Teyvat and explore what lies beneath.',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/explore/swimming/swimming.gif',
                'media_type' => 'gif',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($experiences as $experience) {
            GameplayExperience::updateOrCreate(
                ['slug' => $experience['slug']],
                $experience
            );
        }
    }
}