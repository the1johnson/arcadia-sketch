<?php

namespace App\Http\Controllers;

use App\Models\ArcadeLocation;
use Illuminate\Http\Request;

class ArcadeLocationController extends Controller
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
            'arcade_id' => ['required'],
            'address' => ['required', 'min:4', 'max:255'],
            'city' => ['required', 'min:4', 'max:255'],
            'state' => ['required', 'min:2', 'max:255'],
            'zip' => ['required', 'min:4', 'max:255'],
            'thumbnail' => ['min:4', 'max:255'],
        ]);
        unset($validated['arcade_name']);
        ArcadeLocation::create($validated);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArcadeLocation  $arcadeLocation
     * @return \Illuminate\Http\Response
     */
    public function show(ArcadeLocation $arcadeLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArcadeLocation  $arcadeLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(ArcadeLocation $arcadeLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArcadeLocation  $arcadeLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArcadeLocation $arcadeLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArcadeLocation  $arcadeLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArcadeLocation $arcadeLocation)
    {
        //
    }
}
