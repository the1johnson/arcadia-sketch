<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $typeList = explode(',', env('GAME_TYPE_LIST'));
        return [
            'name' => $this->faker->unique()->name(),
            'thumbnail' => $this->faker->imageUrl(640, 640),
            'type' => $this->faker->randomElement($typeList),
        ];
    }
}
