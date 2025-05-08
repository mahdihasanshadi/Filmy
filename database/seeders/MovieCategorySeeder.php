<?php

namespace Database\Seeders;

use App\Models\MovieCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MovieCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Feature Film',
            'TV Series',
            'Animation',
            'Documentary',
            'Short Film',
            'Independent Film',
            'Classic',
            'Blockbuster',
            'Art House'
        ];

        foreach ($categories as $category) {
            MovieCategory::firstOrCreate(
                ['name' => $category],
                [
                    'slug' => Str::slug($category),
                    'is_active' => true
                ]
            );
        }

        // Create a few random categories
        MovieCategory::factory()->count(3)->create();
    }
}
