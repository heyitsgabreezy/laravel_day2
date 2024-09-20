<?php

namespace Database\Seeders;

use App\Models\MovieCategory;
use Illuminate\Database\Seeder;

class MovieCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            "Action",
            "Horror",
            "Love Story",
        ];

        foreach ($categories as $category) {
           MovieCategory::create([
                'name' => $category,
                'description' => fake()->text(),
           ]);
        }
    }
}
