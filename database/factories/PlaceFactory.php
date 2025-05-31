<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'      => $this->faker->unique()->city(),
            'latitude'  => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
