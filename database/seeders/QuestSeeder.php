<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quest;


class QuestSeeder extends Seeder
{
    public function run(): void
    {

        Quest::insert([


            [
                'title' => 'Opening Quest',

                'subtitle' => 'Begin Your Adventure',

                'description' =>
                'Start your journey across Teyvat and uncover the mysteries waiting ahead.',

                'media_url' =>
                'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/quests/Penutupan%20Archon%20Quest.png',

                'type' => 'opening',

                'order' => 1,

                'created_at' => now(),

                'updated_at' => now(),
            ],



            [
                'title' => 'Book Quest',

                'subtitle' => 'Follow The Story',

                'description' =>
                'Track your missions, discover new chapters, and continue your adventure through every story.',

                'media_url' =>
                'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/quests/Book%20Quest.png',

                'type' => 'story',

                'order' => 2,

                'created_at' => now(),

                'updated_at' => now(),
            ],




            [
                'title' => 'Quest Complete',

                'subtitle' => 'Complete Your Journey',

                'description' =>
                'Finish every chapter and preserve the memories created throughout your adventure.',

                'media_url' =>
                'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/quests/Penutupan%20Archon%20Quest%20(1).png',

                'type' => 'complete',

                'order' => 3,

                'created_at' => now(),

                'updated_at' => now(),
            ],




            [
                'title' => 'Event Quest',

                'subtitle' => 'Limited Adventures',

                'description' =>
                'Join special events and experience new challenges beyond the main story.',

                'media_url' =>
                'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/gameplay-media/quests/Event%20Quest.png',

                'type' => 'event',

                'order' => 4,

                'created_at' => now(),

                'updated_at' => now(),
            ],


        ]);

    }
}