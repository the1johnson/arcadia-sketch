<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArcadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $currencyList = explode(',', env('CURRENCY_LIST'));
        return [
            'name' => $this->faker->unique()->name(),
            'currency' => $this->faker->randomElement($currencyList),
        ];
    }
}
