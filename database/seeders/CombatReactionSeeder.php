<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CombatReaction;

class CombatReactionSeeder extends Seeder
{
    public function run(): void
    {
        $reactions = [

            // Amplifying
            [
                'name' => 'Vaporize',
                'category' => 'Amplifying',
                'description' => 'Pyro + Hydro increases damage.',
                'order' => 1,
                'is_active' => true,
            ],

            [
                'name' => 'Melt',
                'category' => 'Amplifying',
                'description' => 'Pyro + Cryo increases damage.',
                'order' => 2,
                'is_active' => true,
            ],


            // Additive
            [
                'name' => 'Quicken',
                'category' => 'Additive',
                'description' => 'Applies Quicken status.',
                'order' => 3,
                'is_active' => true,
            ],

            [
                'name' => 'Aggravate',
                'category' => 'Additive',
                'description' => 'Boosts Electro damage.',
                'order' => 4,
                'is_active' => true,
            ],

            [
                'name' => 'Spread',
                'category' => 'Additive',
                'description' => 'Boosts Dendro damage.',
                'order' => 5,
                'is_active' => true,
            ],


            // Transformative
            [
                'name' => 'Overloaded',
                'category' => 'Transformative',
                'description' => 'Creates AoE explosion.',
                'order' => 6,
                'is_active' => true,
            ],

            [
                'name' => 'Electro-Charged',
                'category' => 'Transformative',
                'description' => 'Deals continuous Electro damage.',
                'order' => 7,
                'is_active' => true,
            ],

            [
                'name' => 'Superconduct',
                'category' => 'Transformative',
                'description' => 'Reduces Physical RES.',
                'order' => 8,
                'is_active' => true,
            ],

            [
                'name' => 'Swirl',
                'category' => 'Transformative',
                'description' => 'Spreads elemental effects.',
                'order' => 9,
                'is_active' => true,
            ],

            [
                'name' => 'Shatter',
                'category' => 'Transformative',
                'description' => 'Deals Physical damage.',
                'order' => 10,
                'is_active' => true,
            ],


            // Dendro Core
            [
                'name' => 'Bloom',
                'category' => 'Dendro Core',
                'description' => 'Creates Dendro Core.',
                'order' => 11,
                'is_active' => true,
            ],

            [
                'name' => 'Hyperbloom',
                'category' => 'Dendro Core',
                'description' => 'Creates homing projectiles.',
                'order' => 12,
                'is_active' => true,
            ],

            [
                'name' => 'Burgeon',
                'category' => 'Dendro Core',
                'description' => 'Triggers AoE explosion.',
                'order' => 13,
                'is_active' => true,
            ],


            // Utility
            [
                'name' => 'Frozen',
                'category' => 'Utility',
                'description' => 'Freezes enemies.',
                'order' => 14,
                'is_active' => true,
            ],

            [
                'name' => 'Crystallize',
                'category' => 'Utility',
                'description' => 'Creates elemental shield.',
                'order' => 15,
                'is_active' => true,
            ],

            [
                'name' => 'Burning',
                'category' => 'Utility',
                'description' => 'Deals continuous Pyro damage.',
                'order' => 16,
                'is_active' => true,
            ],

        ];


        foreach ($reactions as $reaction) {

            CombatReaction::updateOrCreate(
                ['name' => $reaction['name']],
                $reaction
            );

        }
    }
}