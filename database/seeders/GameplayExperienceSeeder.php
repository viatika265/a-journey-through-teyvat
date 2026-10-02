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
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/sign/gameplay-media/explore/open-world/openworld.gif?token=eyJraWQiOiJjMTYwYzA0MS0zNTNkLTQ0NWMtOWIxNS1jZjEyYzkyMjBhMGIiLCJhbGciOiJIUzUxMiJ9.eyJ1cmwiOiJnYW1lcGxheS1tZWRpYS9leHBsb3JlL29wZW4td29ybGQvb3BlbndvcmxkLmdpZiIsInNjb3BlIjoiZG93bmxvYWQiLCJpYXQiOjE3OTA3NDQ4MTQsImV4cCI6MzMzMjY3NDQ4MTR9.1LbO5KuXPO5O37LaKA-rw7MWqduxh6f48G2PmT1VEQ-AcFOo1CHJPq5HbE62ui6Fcygkm_wpp59RPStAJDW0EQ',
                'media_type' => 'gif',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Running',
                'slug' => 'running',
                'description' => 'Run through the beautiful landscapes of Teyvat and explore the world around you.',
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/sign/gameplay-media/explore/running/running.gif?token=eyJraWQiOiJjMTYwYzA0MS0zNTNkLTQ0NWMtOWIxNS1jZjEyYzkyMjBhMGIiLCJhbGciOiJIUzUxMiJ9.eyJ1cmwiOiJnYW1lcGxheS1tZWRpYS9leHBsb3JlL3J1bm5pbmcvcnVubmluZy5naWYiLCJzY29wZSI6ImRvd25sb2FkIiwiaWF0IjoxNzkwNzQ0ODQyLCJleHAiOjI2NTQ3NDQ4NDJ9.6yfxETHVfdxKYn5n83KzULZQ87z4bwfwW2SvWnoUyVmazSZ9FekX3kmxmJ7s9iUuNlccffo1bfRxMPSdnKTYng',
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
                'media_url' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/sign/gameplay-media/explore/swimming/swimming.gif?token=eyJraWQiOiJjMTYwYzA0MS0zNTNkLTQ0NWMtOWIxNS1jZjEyYzkyMjBhMGIiLCJhbGciOiJIUzUxMiJ9.eyJ1cmwiOiJnYW1lcGxheS1tZWRpYS9leHBsb3JlL3N3aW1taW5nL3N3aW1taW5nLmdpZiIsInNjb3BlIjoiZG93bmxvYWQiLCJpYXQiOjE3OTA3NDQ5NDIsImV4cCI6MzE1NTM5MDc0NDk0Mn0.VxfS8Q6JGLJNHQ2JR_DJSUiKcT5lppEy3aIFlMtS-LMMGmstE2eykD10yU8-Dho0zc7VArhgK8L9WzhX4BwjvA',
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
