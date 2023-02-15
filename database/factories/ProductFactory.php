<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'code' => fake()->regexify('[A-Z0-9]{10}'),
            'name' => fake()->words(rand(1, 3), true),
            'description' => fake()->text(rand(50, 150)),
            'price' => fake()->randomNumber(5, false),
            'weight' => fake()->randomNumber(5, false),
        ];
    }
}