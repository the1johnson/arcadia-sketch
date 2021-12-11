<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preGame = json_decode(file_get_contents(storage_path() . "/json/games_list.json"));
        foreach ($preGame as $game) {
            Game::factory()
            ->hasArcadeLocations(1, [
                'arcade_location_id' => 1,
                'cost' => $game->cost
            ])
            ->create([
                'name' => $game->name,
                'type' => $game->type,
                'multi_swipe' => isset($game->multi_swipe) && $game->multi_swipe ? true : false,
            ]);
        }
    }
}
