<?php

namespace Database\Factories;

use App\Models\MovieCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    public function definition(): array
    {
        return [
            'movie_category_id' => MovieCategory::all()->random()->id,
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'director' => fake()->name(),
            'rating' => fake()->numberBetween(1, 5),
            'published_at' => fake()->date(),
        ];
    }
}
