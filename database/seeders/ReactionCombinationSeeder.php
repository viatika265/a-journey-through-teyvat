<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReactionCombination;
use App\Models\CombatReaction;
use App\Models\Element;

class ReactionCombinationSeeder extends Seeder
{
    public function run(): void
    {

        $elements = Element::pluck('id','name');

        $reactions = CombatReaction::pluck('id','name');


        $data = [

            [
                'reaction_id'=>$reactions['Vaporize'],
                'element_1_id'=>$elements['Pyro'],
                'element_2_id'=>$elements['Hydro'],
                'order'=>1
            ],

            [
                'reaction_id'=>$reactions['Melt'],
                'element_1_id'=>$elements['Pyro'],
                'element_2_id'=>$elements['Cryo'],
                'order'=>2
            ],


            [
                'reaction_id'=>$reactions['Quicken'],
                'element_1_id'=>$elements['Dendro'],
                'element_2_id'=>$elements['Electro'],
                'order'=>3
            ],


            [
                'reaction_id'=>$reactions['Aggravate'],
                'element_1_id'=>$elements['Electro'],
                'element_2_id'=>$elements['Dendro'],
                'order'=>4
            ],


            [
                'reaction_id'=>$reactions['Spread'],
                'element_1_id'=>$elements['Dendro'],
                'element_2_id'=>$elements['Electro'],
                'order'=>5
            ],


            [
                'reaction_id'=>$reactions['Overloaded'],
                'element_1_id'=>$elements['Pyro'],
                'element_2_id'=>$elements['Electro'],
                'order'=>6
            ],


            [
                'reaction_id'=>$reactions['Electro-Charged'],
                'element_1_id'=>$elements['Hydro'],
                'element_2_id'=>$elements['Electro'],
                'order'=>7
            ],


            [
                'reaction_id'=>$reactions['Superconduct'],
                'element_1_id'=>$elements['Cryo'],
                'element_2_id'=>$elements['Electro'],
                'order'=>8
            ],


            [
                'reaction_id'=>$reactions['Swirl'],
                'element_1_id'=>$elements['Anemo'],
                'element_2_id'=>$elements['Pyro'],
                'order'=>9
            ],


            [
                'reaction_id'=>$reactions['Bloom'],
                'element_1_id'=>$elements['Dendro'],
                'element_2_id'=>$elements['Hydro'],
                'order'=>10
            ],


            [
                'reaction_id'=>$reactions['Frozen'],
                'element_1_id'=>$elements['Hydro'],
                'element_2_id'=>$elements['Cryo'],
                'order'=>11
            ],


            [
                'reaction_id'=>$reactions['Crystallize'],
                'element_1_id'=>$elements['Geo'],
                'element_2_id'=>$elements['Pyro'],
                'order'=>12
            ],


            [
                'reaction_id'=>$reactions['Burning'],
                'element_1_id'=>$elements['Dendro'],
                'element_2_id'=>$elements['Pyro'],
                'order'=>13
            ],


        ];


        foreach($data as $item){

            ReactionCombination::create($item);

        }

    }
}