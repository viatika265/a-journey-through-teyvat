<?php

namespace App\Http\Controllers;

use App\Models\CombatReaction;
use App\Models\CombatState;
use App\Models\Element;
use App\Models\GameplayExperience;
use App\Models\Quest;
use Illuminate\View\View;

class GameplayController extends Controller
{
    public function index(): View
    {
        // Explore the World
        $experiences = GameplayExperience::where('is_active', true)
            ->orderBy('order')
            ->get();

        // Elemental Combat
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

        // Quests & Stories
        $quests = Quest::with([
            'region',
            'scenes',
        ])
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('gameplay.index', compact(
            'experiences',
            'elements',
            'combatReactions',
            'combatStates',
            'quests'
        ));
    }
}