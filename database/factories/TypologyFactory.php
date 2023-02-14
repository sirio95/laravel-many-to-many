<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class TypologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->regexify('[A-Z]{2}[0-9]{2}'),
            'name' => fake()->words(2, true),
            'digital' => fake()->boolean(),
        ];
    }
}