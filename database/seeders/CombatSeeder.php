<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Element;
use App\Models\CombatState;
use App\Models\CombatReaction;
use App\Models\ReactionCombination;


class CombatSeeder extends Seeder
{

    public function run(): void
    {


        /*
        |--------------------------------------------------------------------------
        | ELEMENTS
        |--------------------------------------------------------------------------
        */

        $elements = Element::whereIn('slug', [

            'anemo',
            'geo',
            'electro',
            'dendro',
            'hydro',
            'pyro',
            'cryo',

        ])
        ->get()
        ->keyBy('slug');




        /*
        |--------------------------------------------------------------------------
        | COMBAT STATES
        |--------------------------------------------------------------------------
        */


        $states = [];


        $stateData = [

            [
                'name'=>'Quicken',
                'description'=>'Dendro dan Electro menghasilkan status Quicken.'
            ],

            [
                'name'=>'Dendro Core',
                'description'=>'Dendro Core dari reaksi Bloom.'
            ],

            [
                'name'=>'Frozen',
                'description'=>'Hydro dan Cryo membekukan musuh.'
            ],

        ];



        foreach($stateData as $data){


            $state = CombatState::updateOrCreate(

                [
                    'name'=>$data['name']
                ],

                $data

            );


            $states[$state->name]=$state;


        }






        /*
        |--------------------------------------------------------------------------
        | COMBAT REACTIONS
        |--------------------------------------------------------------------------
        */


        $reactionData = [

    [
        'name'=>'Vaporize',
        'category'=>'Amplifying',
        'description'=>'Pyro + Hydro increases damage.',
        'order'=>1,
    ],

    [
        'name'=>'Melt',
        'category'=>'Amplifying',
        'description'=>'Pyro + Cryo increases damage.',
        'order'=>2,
    ],

    [
        'name'=>'Quicken',
        'category'=>'Additive',
        'description'=>'Applies Quicken status.',
        'order'=>3,
    ],

    [
        'name'=>'Aggravate',
        'category'=>'Additive',
        'description'=>'Boosts Electro damage.',
        'order'=>4,
    ],

    [
        'name'=>'Spread',
        'category'=>'Additive',
        'description'=>'Boosts Dendro damage.',
        'order'=>5,
    ],

    [
        'name'=>'Overloaded',
        'category'=>'Transformative',
        'description'=>'Creates an AoE explosion.',
        'order'=>6,
    ],

    [
        'name'=>'Electro-Charged',
        'category'=>'Transformative',
        'description'=>'Deals continuous Electro damage.',
        'order'=>7,
    ],

    [
        'name'=>'Superconduct',
        'category'=>'Transformative',
        'description'=>'Deals Cryo damage and reduces Physical RES.',
        'order'=>8,
    ],

    [
        'name'=>'Swirl',
        'category'=>'Transformative',
        'description'=>'Spreads elemental effects.',
        'order'=>9,
    ],

    [
        'name'=>'Shatter',
        'category'=>'Transformative',
        'description'=>'Deals additional Physical damage.',
        'order'=>10,
    ],

    [
        'name'=>'Bloom',
        'category'=>'Dendro Core',
        'description'=>'Creates a Dendro Core.',
        'order'=>11,
    ],

    [
        'name'=>'Hyperbloom',
        'category'=>'Dendro Core',
        'description'=>'Turns Dendro Core into projectiles.',
        'order'=>12,
    ],

    [
        'name'=>'Burgeon',
        'category'=>'Dendro Core',
        'description'=>'Triggers Dendro Core explosion.',
        'order'=>13,
    ],

    [
        'name'=>'Frozen',
        'category'=>'Utility',
        'description'=>'Freezes enemies.',
        'order'=>14,
    ],

    [
        'name'=>'Crystallize',
        'category'=>'Utility',
        'description'=>'Creates elemental shields.',
        'order'=>15,
    ],

    [
        'name'=>'Burning',
        'category'=>'Utility',
        'description'=>'Deals continuous Pyro damage.',
        'order'=>16,
    ],

];




        $reactions = [];



        foreach($reactionData as $data){


            $reaction = CombatReaction::updateOrCreate(

                [
                    'name'=>$data['name']
                ],


                [
                    ...$data,
                    'is_active'=>true,
                ]

            );


            $reactions[$reaction->name]=$reaction;


        }






        /*
        |--------------------------------------------------------------------------
        | REACTION COMBINATIONS
        |--------------------------------------------------------------------------
        */


        $combinations = [


            [
                'reaction'=>'Vaporize',
                'element_1'=>'pyro',
                'element_2'=>'hydro',
                'type'=>'element'
            ],


            [
                'reaction'=>'Melt',
                'element_1'=>'pyro',
                'element_2'=>'cryo',
                'type'=>'element'
            ],


            [
                'reaction'=>'Quicken',
                'element_1'=>'dendro',
                'element_2'=>'electro',
                'type'=>'element'
            ],


            [
                'reaction'=>'Aggravate',
                'element_1'=>'electro',
                'state_1'=>'Quicken',
                'type'=>'state'
            ],


            [
                'reaction'=>'Spread',
                'element_1'=>'dendro',
                'state_1'=>'Quicken',
                'type'=>'state'
            ],


            [
                'reaction'=>'Overloaded',
                'element_1'=>'pyro',
                'element_2'=>'electro',
                'type'=>'element'
            ],


            [
                'reaction'=>'Electro-Charged',
                'element_1'=>'hydro',
                'element_2'=>'electro',
                'type'=>'element'
            ],


            [
                'reaction'=>'Superconduct',
                'element_1'=>'cryo',
                'element_2'=>'electro',
                'type'=>'element'
            ],


            [
                'reaction'=>'Swirl',
                'element_1'=>'anemo',
                'element_2'=>'pyro',
                'type'=>'element'
            ],


            [
                'reaction'=>'Bloom',
                'element_1'=>'dendro',
                'element_2'=>'hydro',
                'type'=>'element'
            ],


            [
                'reaction'=>'Hyperbloom',
                'element_1'=>'electro',
                'state_1'=>'Dendro Core',
                'type'=>'state'
            ],


            [
                'reaction'=>'Burgeon',
                'element_1'=>'pyro',
                'state_1'=>'Dendro Core',
                'type'=>'state'
            ],


            [
                'reaction'=>'Frozen',
                'element_1'=>'hydro',
                'element_2'=>'cryo',
                'type'=>'element'
            ],


            [
                'reaction'=>'Crystallize',
                'element_1'=>'geo',
                'element_2'=>'pyro',
                'type'=>'element'
            ],


            [
                'reaction'=>'Burning',
                'element_1'=>'dendro',
                'element_2'=>'pyro',
                'type'=>'element'
            ],


        ];





        foreach($combinations as $index=>$data){


            ReactionCombination::updateOrCreate(

                [

                    'reaction_id'=>$reactions[$data['reaction']]->id,


                    'element_1_id'=>isset($data['element_1'])
                    ? $elements[$data['element_1']]->id
                    : null,


                    'element_2_id'=>isset($data['element_2'])
                    ? $elements[$data['element_2']]->id
                    : null,


                    'state_1_id'=>isset($data['state_1'])
                    ? $states[$data['state_1']]->id
                    : null,


                ],


                [

                    'trigger_type'=>$data['type'],

                    'order'=>$index+1,

                ]

            );


        }


    }

}