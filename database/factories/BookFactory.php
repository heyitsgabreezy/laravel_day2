<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'country_id' => fake()->numberBetween(1, 100),
            'stocks' => fake()->numberBetween(1, 1000),
            'amount' => fake()->randomFloat(2, 500, 2500),
            'photo' => fake()->imageUrl(640, 480, 'books', true),
        ];
    }
}
