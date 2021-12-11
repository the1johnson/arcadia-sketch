<?php

namespace App\View\Components;

use App\Models\Arcade;
use Illuminate\View\Component;
use App\Models\ArcadeLocationGame;

class RoundOneInfo extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $arcade = Arcade::all()->first();
        $arcadeLocation = $arcade->locations()->first();
        $gameList = ArcadeLocationGame::get()->all();
        // ddd($gameList);
        // ddd(ArcadeLocationGame::where($arcadeLocation->id)->get()->all());
        $gl = array_map(function($arcadeLocationGame){
            $payoutMin = 0;
            $payoutMax = 0;
            $payoutFloorVals = [];
            foreach ($arcadeLocationGame->payouts as $pi => $payObj) {
                $valFloor = floor($payObj->tickets/$payObj->swipes);
                $payoutFloorVals[] = $valFloor;
                $payoutMin = ($valFloor < $payoutMin || $pi === 0) ? $valFloor : $payoutMin;
                $payoutMax = $valFloor > $payoutMax ? $valFloor : $payoutMax;
            }
            $floorValArrayLen = count($payoutFloorVals);
            $payoutAverage = $floorValArrayLen ? floor(array_sum($payoutFloorVals)/$floorValArrayLen) : 0;
            // dd($arcadeLocationGame->game->name.' Min: '.$payoutMin.' Max: '.$payoutMax.' Mean: '.$payoutAverage);
            return [
                'id' => $arcadeLocationGame->id,
                'game' => $arcadeLocationGame->game,
                'cost' => $arcadeLocationGame->cost,
                'payoutsFloor' => $payoutFloorVals,
                'payoutStats' => [
                    'min' => $payoutMin,
                    'max' => $payoutMax,
                    'mean' => $payoutAverage,
                ],
            ];
        }, $gameList);
        // dd($gl);


        return view('components.round-one-info', [
            'arcade' => $arcade,
            'arcade_location' => $arcadeLocation,
            'games' => $gl,
        ]);
    }
}
