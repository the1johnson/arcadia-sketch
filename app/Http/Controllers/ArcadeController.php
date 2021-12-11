<?php

namespace App\Http\Controllers;

use App\Models\Arcade;
use App\Models\ArcadeLocations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArcadeController extends Controller
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
            'name' => ['required', 'unique:arcades', 'min:4', 'max:255']
        ]);

        Arcade::create($validated);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arcade  $arcade
     * @return \Illuminate\Http\Response
     */
    public function show(Arcade $arcade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arcade  $arcade
     * @return \Illuminate\Http\Response
     */
    public function edit(Arcade $arcade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arcade  $arcade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arcade $arcade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arcade  $arcade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arcade $arcade)
    {
        //
    }

    public function name_search(Request $request)
    {
        $arcades = Arcade::query()
            ->where('name', 'ilike', $request->name.'%')
            ->with('locations')
            ->get();
        return $arcades;
    }
}
