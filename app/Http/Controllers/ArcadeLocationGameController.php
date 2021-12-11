<?php

namespace App\Http\Controllers;

use App\Models\ArcadeLocationGame;
use Illuminate\Http\Request;

class ArcadeLocationGameController extends Controller
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
        $validated = $request->validate([
            'arcade_location_id' => ['required'],
            'game_id' => ['required'],
            'cost' => ['required'],
        ]);
        ArcadeLocationGame::create($validated);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArcadeLocationGame  $arcadeLocationGame
     * @return \Illuminate\Http\Response
     */
    public function show(ArcadeLocationGame $arcadeLocationGame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArcadeLocationGame  $arcadeLocationGame
     * @return \Illuminate\Http\Response
     */
    public function edit(ArcadeLocationGame $arcadeLocationGame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArcadeLocationGame  $arcadeLocationGame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArcadeLocationGame $arcadeLocationGame)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArcadeLocationGame  $arcadeLocationGame
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArcadeLocationGame $arcadeLocationGame)
    {
        //
    }
}
