<?php

namespace App\Http\Controllers;

use App\Models\PlayLog;
use Illuminate\Http\Request;

class PlayLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->all());
        $validated = $request->validate([
            'arcade_location_game_id' => ['required'],
            'tickets' => ['required'],
            'swipes' => ['required'],
        ]);

        $isJackpot = isset($request->all()['jackpot']) ? true : false;

        $ticketsExploded = explode(',', $validated['tickets']);
        foreach ($ticketsExploded as $ticketCount) {
            PlayLog::create([
                'arcade_location_game_id' => $validated['arcade_location_game_id'],
                'user_id' => auth()->user()->id,
                'jackpot' => $isJackpot,
                'swipes' => $validated['swipes'],
                'tickets' => intval($ticketCount),
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlayLog  $playLog
     * @return \Illuminate\Http\Response
     */
    public function show(PlayLog $playLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlayLog  $playLog
     * @return \Illuminate\Http\Response
     */
    public function edit(PlayLog $playLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlayLog  $playLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlayLog $playLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlayLog  $playLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlayLog $playLog)
    {
        //
    }

    public function claim_notebook_plays(){
        $gamesInfo = json_decode(file_get_contents(storage_path() . "/json/games_list.json"));
        foreach ($gamesInfo as $gi => $game) {
            // ddd($game);
            foreach ($game->roundOneConcordPlays as $gamePayout){
                PlayLog::create([
                    'arcade_location_game_id' => $gi+1,
                    'user_id' => auth()->user()->id,
                    'jackpot' => false,
                    'swipes' => $gamePayout->swipes,
                    'tickets' => $gamePayout->tickets,
                ]);
            }
        }
        return back();
    }
}
