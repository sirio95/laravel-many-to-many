<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->regexify('[A-Z]{5}[0-9]{5}'),
            'name' => fake()->words(rand(1, 4), true),
            'description' => fake()->text(rand(50, 150)),
            'price' => fake()->randomNumber(5, false),
            'weight' => fake()->randomNumber(5, false),
        ];
    }
}