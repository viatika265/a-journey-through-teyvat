<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Character;
use App\Models\GameplayExperience;
use App\Models\Element;
use App\Models\CombatReaction;
use App\Models\CombatState;
use App\Models\Quest;

class HomeController extends Controller
{
    public function index()
    {
        $regions = Region::all();

        // Koordinat dan tampilan region pada Teyvat Map
        $coordinates = [
            'Mondstadt' => [
                'x' => 4353,
                'y' => 2846,
                'color' => '#429C99',
                'gradients' => 'linear-gradient(180deg, #32C4F7 0%, #3EADDD 39%, #429C99 65%, #0E597A 100%)',
            ],

            'Liyue' => [
                'x' => 4068,
                'y' => 3684,
                'color' => '#E4BF18',
                'gradients' => 'linear-gradient(180deg, #E7A481 0%, #CF9160 50%, #A5734D 75%, #5F3B1F 100%)',
            ],

            'Inazuma' => [
                'x' => 5000,
                'y' => 4500,
                'color' => '#42339C',
                'gradients' => 'linear-gradient(180deg, #F6BFF6 0%, #DC92C1 50%, #CB8CB5 75%, #A46F91 100%)',
            ],

            'Sumeru' => [
                'x' => 3333,
                'y' => 3789,
                'color' => '#1F6B32',
                'gradients' => 'linear-gradient(180deg, #63BCFE 0%, #50A5DB 35%, #2E6A76 63%, #638B57 100%)',
            ],

            'Fontaine' => [
                'x' => 3073,
                'y' => 2555,
                'color' => '#0666D3',
                'gradients' => 'linear-gradient(180deg, #85C6FA 17%, #6194D6 42%, #36A3B1 63%, #639890 83%)',
            ],

            'Natlan' => [
                'x' => 1827,
                'y' => 4010,
                'color' => '#A32D1F',
                'gradients' => 'linear-gradient(180deg, #FEC9BF 0%, #98525B 50%, #324144 91%)',
            ],

            'Snezhnaya' => [
                'x' => 2483,
                'y' => 1198,
                'color' => '#84C4D0',
                'gradients' => 'linear-gradient(180deg, #1F67CD 8%, #C0E1FF 34%, #4379C6 50%, #103467 100%)',
            ],

            'Nod-Krai' => [
                'x' => 1651,
                'y' => 2914,
                'color' => '#131536',
                'gradients' => 'linear-gradient(180deg, #032C6E 13%, #AA9148 40%, #002595 75%, #000281 100%)',
            ],
        ];

        // Tambahkan data koordinat ke setiap region
        $regions = $regions->map(function ($region) use ($coordinates) {
            return [
                'name' => $region->name,
                'slug' => $region->slug,
                'short_description' => $region->short_description,
                'card_image' => $region->card_image,
                'icon' => $region->icon,
                'emblem' => $region->icon,

                'x' => $coordinates[$region->name]['x'] ?? 0,
                'y' => $coordinates[$region->name]['y'] ?? 0,
                'color' => $coordinates[$region->name]['color'] ?? '#fff',
                'gradients' => $coordinates[$region->name]['gradients'] ?? '',
            ];
        });

        // Characters
        $characters = Character::whereNotNull('additional_image')
            ->where('additional_image', '!=', '')
            ->inRandomOrder()
            ->take(4)
            ->get();

        // =========================
        // Gameplay - Explore
        // =========================

        $experiences = GameplayExperience::where('is_active', true)
            ->orderBy('order')
            ->get();

        // =========================
        // Gameplay - Elemental Combat
        // =========================

        $elements = Element::orderBy('id')
            ->get();

        $combatReactions = CombatReaction::with([
            'combinations.elementOne',
            'combinations.elementTwo',
            'combinations.stateOne',
            'combinations.stateTwo',
        ])
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        $combatStates = CombatState::all();

        // =========================
        // Gameplay - Quest
        // =========================

        $quests = Quest::with([
            'region',
            'scenes',
        ])
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        // =========================
        // Kirim data ke Home
        // =========================

        return view('home', compact(
            'regions',
            'characters',
            'experiences',
            'elements',
            'combatReactions',
            'combatStates',
            'quests'
        ));
    }
}
