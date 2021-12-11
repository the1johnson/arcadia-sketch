<?php

namespace Database\Seeders;

use App\Models\Arcade;
use Illuminate\Database\Seeder;

class ArcadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Arcade::factory()
        ->hasLocations(1,[
            'address' => '185 Sun Valley Mall',
            'city' => 'Concord',
            'zip' => 94520
        ])
        ->create([
            'name' => 'Round 1',
            'currency' => 'Chips'
        ]);
    }
}
