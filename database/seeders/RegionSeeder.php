<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Element;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [

            // =========================
            // MONDSTADT
            // =========================
            [
                'name' => 'Mondstadt',
                'slug' => 'mondstadt',
                'title' => 'City Of Freedom',
                'short_description' => 'A city of freedom that lies on an island in the northeastern Teyvat',
                'long_description' => 'Located on an island in the middle of a lake in the northeastern region of Teyvat, Mondstadt stands majestically as the city of freedom. 
                                        Through the blessing of Barbatos, the Anemo Archon, the winds that sweep across the 
                                        mountains and vast plains carry the scent of dandelion seeds from Cider Lake, flying them to Mondstadt to find a new place to take root.',
                'card_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/mondstadt/card.png',
                'background_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/mondstadt/background.png',
                'landmark_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/mondstadt/landmark.png',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/mondstadt/icon.png',
                'archon_icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/mondstadt/archon.png',
                'element_id' => Element::where('slug', 'anemo')->firstOrFail()->id,
            ],

            // =========================
            // LIYUE
            // =========================
            [
                'name' => 'Liyue',
                'slug' => 'liyue',
                'title' => 'The Nation of Contracts',
                'short_description' => 'A bountiful harbor that lies in the east of Teyvat',
                'long_description' => 'This port city in the eastern part of Teyvat offers a magnificent view of Liyue\`s natural scenery, thanks to the majestic mountain range surrounding the stone forest, vast plains, and vibrant rivers. 
                                        The pristine beauty of its scenery continuously changes colors with the seasons, accompanied by warmth thanks to the Geo Archon hidden behind the rocky mountains.',
                'card_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/liyue/card.png',
                'background_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/liyue/background.png',
                'landmark_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/liyue/landmark.png',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/liyue/icon.png',
                'archon_icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/liyue/archon.png',
                'element_id' => Element::where('slug', 'geo')->firstOrFail()->id,
            ],

            // =========================
            // INAZUMA
            // =========================
            [
                'name' => 'Inazuma',
                'slug' => 'inazuma',
                'title' => 'The Nation of Eternity',
                'short_description' => 'An isolated island shrouded in eternal thunderstorms in the east of Teyvat',
                'long_description' => 'In the east of Teyvat, an isolated island shrouded in eternal thunderstorms, where fields of cherry and red maple trees bloom. 
                                        From the winding coastline, steep cliffs, to the rows of mountains and forests shrouded in mystery, this region bears silent witness to the vision of Eternity championed by the Almighty Narukami Ogosho.',
                'card_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/inazuma/card.png',
                'background_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/inazuma/background.png',
                'landmark_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/inazuma/landmark.png',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/inazuma/icon.png',
                'archon_icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/inazuma/archon.png',
                'element_id' => Element::where('slug', 'electro')->firstOrFail()->id,
            ],

            // =========================
            // SUMERU
            // =========================
            [
                'name' => 'Sumeru',
                'slug' => 'sumeru',
                'title' => 'The Nation of Wisdom',
                'short_description' => 'an Academic city in the western central region of Teyvat',
                'long_description' => 'Standing as an academic city in the western central region of Teyvat, Sumeru presents an exotic landscape of a combination of dense rainforests and steep deserts. 
                                        In the land where the seeds of wisdom grow and change, travelers can reap valuable knowledge by exploring the dense forests, ascending the ladder of learning, or uncovering the secrets of ancient ruins hidden beneath the desert sands.',
                'card_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/sumeru/card.png',
                'background_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/sumeru/background.png',
                'landmark_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/sumeru/landmark.png',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/sumeru/icon.png',
                'archon_icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/sumeru/archon.png',
                'element_id' => Element::where('slug', 'dendro')->firstOrFail()->id,
            ],

            // =========================
            // FONTAINE
            // =========================
            [
                'name' => 'Fontaine',
                'slug' => 'fontaine',
                'title' => 'The Nation of Justice',
                'short_description' => 'Located in the heart of Teyvat, this nation stretches like a sea of land. ',
                'long_description' => 'Located in the heart of Teyvat, this nation stretches like a sea of land. Following the flow of water through the expanse of fields, the lushness of forests, and the scorching desert will take you right to the source of its water system. 
                                        Behind the majestic peaks of the waterfall and the dark ocean above the highlands, lies an untold tale and an ancient legend, like a submerged civilization now awaiting the arrival of a traveler.',
                'card_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/fontaine/card.png',
                'background_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/fontaine/background.png',
                'landmark_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/fontaine/landmark.png',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/fontaine/icon.png',
                'archon_icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/fontaine/archon.png',
                'element_id' => Element::where('slug', 'hydro')->firstOrFail()->id,
            ],

            // =========================
            // NATLAN
            // =========================
            [
                'name' => 'Natlan',
                'slug' => 'natlan',
                'title' => 'The Nation of War',
                'short_description' => 'Located in the central-western part of Teyvat, the nation oaths',
                'long_description' => 'Located in the heart of Teyvat, this nation stretches like a sea of land. Following the flow of water through the expanse of fields, the lushness of forests, and the scorching desert will take you right to the source of its water system. 
                                    Behind the majestic peaks of the waterfall and the dark ocean above the highlands, lies an untold tale and an ancient legend, like a submerged civilization now awaiting the arrival of a traveler.',
                'card_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/natlan/card.png',
                'background_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/natlan/background.png',
                'landmark_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/natlan/landmark.png',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/natlan/icon.png',
                'archon_icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/natlan/archon.png',
                'element_id' => Element::where('slug', 'pyro')->firstOrFail()->id,
            ],

            // =========================
            // NOD-KRAI
            // =========================
            [
                'name' => 'Nod-Krai',
                'slug' => 'nod-krai',
                'title' => 'The Nation of Justice',
                'short_description' => 'An isolated, cold autonomous zone in southern Snezhnaya.',
                'long_description' => 'Isolated at the southern border of Snezhnaya, Nod-Krai stands as an autonomous region shrouded in mystery and the whisper of cold winds. 
                                        Among the silent graveyard sanctuaries and the beams of lighthouses on the northern islands, there flows the blessing of ancient moonlight energy (kuuvahki) behind the ruins and dieselpunk-themed shops. In the land guarded by the Lightkeepers, every traveler can witness the eternity of light amidst the darkness of the continent.',
                'card_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/nodkrai/card.png',
                'background_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/nodkrai/background.png',
                'landmark_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/nodkrai/landmark.png',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/nodkrai/icon.png',
                'archon_icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/nodkrai/archon.png',
                'element_id' => Element::where('slug', 'cryo')->firstOrFail()->id,
            ],

            // =========================
            // SNEZHNAYA
            // =========================
            [
                'name' => 'Snezhnaya',
                'slug' => 'snezhnaya',
                'title' => 'The Nation of Justice',
                'short_description' => 'In the north of Teyvat, a nation shrouded in eternal winter',
                'long_description' => 'In the north of Teyvat, a nation shrouded in eternal winter lies spread out. Piercing through the sharp cold and suffering, footsteps cut through the snowstorm, soaring into the sky, crossing the silent frozen land and the city corners echoing with the sounds of machines and steel. 
                                        Under the sacred canopy of the Pale Star, though warmth has vanished, swallowed by the frost, those who harbor sorrow and burning ambition stand together to witness the old world melting upon the icy surface.',
                'card_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/snezhnaya/card.png',
                'background_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/snezhnaya/background.png',
                'landmark_image' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/snezhnaya/landmark.png',
                'icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/snezhnaya/icon.png',
                'archon_icon' => 'https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/regions/snezhnaya/archon.png',
                'element_id' => Element::where('slug', 'cryo')->firstOrFail()->id,
            ],

        ];

        foreach ($regions as $region) {
            Region::updateOrCreate(
                ['slug' => $region['slug']],
                $region
            );
        }
    }
}