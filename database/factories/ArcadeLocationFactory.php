<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArcadeLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->randomNumber(4, false) . ' ' . $this->faker->word() . ' st',
            'city' => $this->faker->word(),
            'state' => 'CA',
            'zip' => $this->faker->randomNumber(5, true),
            'thumbnail' => $this->faker->imageUrl(640, 640),
        ];
    }
}
