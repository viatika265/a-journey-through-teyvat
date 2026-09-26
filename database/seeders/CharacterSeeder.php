<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\Region;
use App\Models\Element;
use App\Models\Weapon;
use App\Models\Artifact;

class CharacterSeeder extends Seeder
{
    public function run(): void
    {
        $characters = [

            // =========================
            // MONDSTADT
            // =========================

            [
                'name' => 'Durin',
                'region' => 'mondstadt',
                'element' => 'pyro',
                'weapon' => 'sword',
                'artifact' => 'noblesse-oblige',
                'description' => 'A dragon born from the pen of “M” has finally arrived in the human world. And its “story” continues to unfold.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/mondstadt/durin/character.png',
                'additional_image' => null,
            ],

            [
                'name' => 'Venti',
                'region' => 'mondstadt',
                'element' => 'anemo',
                'weapon' => 'bow',
                'artifact' => 'viridescent-venerer',
                'description' => 'a wandering bard who is secretly the God of Freedom and Anemo Archon of The Seven, presiding over Mondstadt. Venti is a freedom-loving Archon who refuses to take direct control over his nation, instead choosing to wander the world as a bard.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/mondstadt/venti/character.png',
                'additional_image' => null,
            ],

            [
                'name' => 'Lohen',
                'region' => 'mondstadt',
                'element' => 'cryo',
                'weapon' => 'polearm',
                'artifact' => 'a-day-carved-from-rising-winds',
                'description' => 'The Vice Captain of the Knights of Favonius Reconnaissance Company, a knight who acts without being bound by rules and favors unconventional tactics.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/mondstadt/lohen/character.png',
                'additional_image' => null,
            ],

            // =========================
            // LIYUE
            // =========================

            [
                'name' => 'Yelan',
                'region' => 'liyue',
                'element' => 'hydro',
                'weapon' => 'bow',
                'artifact' => 'emblem-of-severed-fate',
                'description' => 'A mysterious person who claims to work for the Ministry of Civil Affairs, yet is “not registered” in its records.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/liyue/yelan/character.png',
                'additional_image' => null,
            ],

            [
                'name' => 'Zhongli',
                'region' => 'liyue',
                'element' => 'geo',
                'weapon' => 'polearm',
                'artifact' => 'tenacity-of-the-millelith',
                'description' => 'A mysterious consultant bound by contract to the Wangsheng Funeral Parlor. He possesses extensive knowledge of all things.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/liyue/zhongli/character.png',
                'additional_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/liyue/zhongli/additional.png',
            ],

            [
                'name' => 'Hu Tao',
                'region' => 'liyue',
                'element' => 'pyro',
                'weapon' => 'polearm',
                'artifact' => 'crimson-witch-of-flames',
                'description' => 'The 77th Director of the Wangsheng Funeral Parlor. She took over the business at a remarkably young age.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/liyue/hu-tao/character.png',
                'additional_image' => null,
            ],

            // =========================
            // INAZUMA
            // =========================

            [
                'name' => 'Yae Miko',
                'region' => 'inazuma',
                'element' => 'electro',
                'weapon' => 'catalyst',
                'artifact' => 'gilded-dreams',
                'description' => 'The Lady Guuji of the Grand Narukami Shrine also serves as the Editor-in-Chief of Yae Publishing House. Unimaginable intelligence and cunning lie hidden behind her beautiful appearance.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/inazuma/yae-miko/character.png',
                'additional_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/inazuma/yae-miko/additional.png',
            ],

            [
                'name' => 'Raiden Shogun',
                'region' => 'inazuma',
                'element' => 'electro',
                'weapon' => 'polearm',
                'artifact' => 'emblem-of-severed-fate',
                'description' => 'Her Excellency, the Almighty Narukami Ogosho. She promises the people of Inazuma an eternity that will never change.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/inazuma/raiden-shogun/character.png',
                'additional_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/inazuma/raiden-shogun/additional.png',
            ],

            [
                'name' => 'Kaedehara Kazuha',
                'region' => 'inazuma',
                'element' => 'anemo',
                'weapon' => 'sword',
                'artifact' => 'viridescent-venerer',
                'description' => 'A wandering samurai from Inazuma who has joined Liyue’s Crux Fleet. Beneath his gentle and cheerful nature lies a heart burdened by many hardships.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/inazuma/kaedehara-kazuha/character.png',
                'additional_image' => null,
            ],

            // =========================
            // SUMERU
            // =========================

            [
                'name' => 'Wanderer',
                'region' => 'sumeru',
                'element' => 'anemo',
                'weapon' => 'catalyst',
                'artifact' => 'desert-pavilion-chronicle',
                'description' => 'A traveler of mysterious identity. Dressed like a “shugenja,” yet his words and actions are anything but those of a “shugenja.”',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/sumeru/wanderer/character.png',
                'additional_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/sumeru/wanderer/additional.png',
            ],

            [
                'name' => 'Nahida',
                'region' => 'sumeru',
                'element' => 'dendro',
                'weapon' => 'catalyst',
                'artifact' => 'deepwood-memories',
                'description' => 'A girl confined like a bird in a cage within the Sanctuary of Surasthana, able to see the world only through her dreams.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/sumeru/nahida/character.png',
                'additional_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/sumeru/nahida/additional.png',
            ],

            [
                'name' => 'Alhaitham',
                'region' => 'sumeru',
                'element' => 'dendro',
                'weapon' => 'sword',
                'artifact' => 'gilded-dreams',
                'description' => 'The current Scribe of Sumeru Akademiya, possessing exceptional intelligence and talent. He is someone who cherishes freedom and cannot be found unless he wishes to be found.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/sumeru/alhaitham/character.png',
                'additional_image' => null,
            ],

            // =========================
            // FONTAINE
            // =========================

            [
                'name' => 'Neuvillette',
                'region' => 'fontaine',
                'element' => 'hydro',
                'weapon' => 'catalyst',
                'artifact' => 'marechaussee-hunter',
                'description' => 'The Chief Justice of Fontaine, known as the Ludex. He is renowned for always being fair and impartial.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/fontaine/neuvillette/character.png',
                'additional_image' => null,
            ],

            [
                'name' => 'Furina',
                'region' => 'fontaine',
                'element' => 'hydro',
                'weapon' => 'sword',
                'artifact' => 'golden-troupe',
                'description' => 'The center of attention on the courtroom stage, until the applause rings out at the end of the show.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/fontaine/furina/character.png',
                'additional_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/fontaine/furina/additional.png',
            ],

            [
                'name' => 'Wriothesley',
                'region' => 'fontaine',
                'element' => 'cryo',
                'weapon' => 'catalyst',
                'artifact' => 'marechaussee-hunter',
                'description' => 'The Duke and leader of the Fortress of Meropide. The ruler of the murky waters.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/fontaine/wriothesley/character.png',
                'additional_image' => null,
            ],

            // =========================
            // NATLAN
            // =========================

            [
                'name' => 'Kinich',
                'region' => 'natlan',
                'element' => 'dendro',
                'weapon' => 'claymore',
                'artifact' => 'obsidian-codex',
                'description' => 'A Saurian Hunter from Huitztlan, an expert at counting the costs.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/natlan/kinich/character.png',
                'additional_image' => null,
            ],

            [
                'name' => 'Mavuika',
                'region' => 'natlan',
                'element' => 'pyro',
                'weapon' => 'claymore',
                'artifact' => 'obsidian-codex',
                'description' => 'A girl confined like a bird in a cage within the Sanctuary of Surasthana, able to see the world only through her dreams.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/natlan/mavuika/character.png',
                'additional_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/natlan/mavuika/additional.png',
            ],

            [
                'name' => 'Citlali',
                'region' => 'natlan',
                'element' => 'cryo',
                'weapon' => 'catalyst',
                'artifact' => 'scroll-of-the-hero-of-the-cinder-city',
                'description' => 'The Great Shaman of the Lord of the Night-Wind, the revered Grandmother Itztli, respected by people from every tribe.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/natlan/citlali/character.png',
                'additional_image' => null,
            ],

            // =========================
            // NOD-KRAI
            // =========================

            [
                'name' => 'Nefer',
                'region' => 'nod-krai',
                'element' => 'dendro',
                'weapon' => 'catalyst',
                'artifact' => 'night-of-the-skys-unveiling',
                'description' => 'The shrewd and resourceful owner of the Curatorium of Secrets.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/nodkrai/nefer/character.png',
                'additional_image' => null,
            ],

            [
                'name' => 'Columbina',
                'region' => 'nod-krai',
                'element' => 'hydro',
                'weapon' => 'catalyst',
                'artifact' => 'silken-moons-serenade',
                'description' => 'A girl confined like a bird in a cage within the Sanctuary of Surasthana, able to see the world only through her dreams.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/nodkrai/columbina/character.png',
                'additional_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/nodkrai/columbina/additional.png',
            ],

            [
                'name' => 'Flins',
                'region' => 'nod-krai',
                'element' => 'electro',
                'weapon' => 'polearm',
                'artifact' => 'night-of-the-skys-unveiling',
                'description' => 'A Lightkeeper from Nod-Krai who watches over the lighthouse and cemetery on a small island in the north. A mysterious man with exceptionally courteous manners.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/nodkrai/flins/character.png',
                'additional_image' => null,
            ],

            // =========================
            // SNEZHNAYA
            // =========================

            [
                'name' => 'Tartaglia',
                'region' => 'snezhnaya',
                'element' => 'hydro',
                'weapon' => 'bow',
                'artifact' => 'nymphs-dream',
                'description' => 'The 11th of the Fatui Harbingers, also known as “Childe.” The mere mention of his name is enough to strike fear into the hearts of those on the battlefield.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/snezhnaya/tartaglia/character.png',
                'additional_image' => null,
            ],

            [
                'name' => 'Vodyanitsa',
                'region' => 'snezhnaya',
                'element' => 'hydro',
                'weapon' => 'catalyst',
                'artifact' => 'tenacity-of-the-millelith',
                'description' => 'The Prima Donna of the Korolevskiy Theater Troupe, an Imp Air separated from her own kind.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/snezhnaya/vodyanitsa/character.png',
                'additional_image' => null,
            ],

            [
                'name' => 'Odette',
                'region' => 'snezhnaya',
                'element' => 'cryo',
                'weapon' => 'sword',
                'artifact' => 'heart-of-the-furnace',
                'description' => 'A renowned ballerina from Snezhnaya, a frost flower blooming amidst the snow and ice.',
                'character_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/characters/snezhnaya/odette/character.png',
                'additional_image' => null,
            ],
        ];

        foreach ($characters as $character) {
            Character::updateOrCreate(
                ['name' => $character['name']],
                [
                    'region_id' => Region::where('slug', $character['region'])->firstOrFail()->id,
                    'element_id' => Element::where('slug', $character['element'])->firstOrFail()->id,
                    'weapon_id' => Weapon::where('slug', $character['weapon'])->firstOrFail()->id,
                    'artifact_id' => Artifact::where('slug', $character['artifact'])->firstOrFail()->id,
                    'description' => $character['description'],
                    'character_image' => $character['character_image'],
                    'additional_image' => $character['additional_image'],
                ]
            );
        }
    }
}