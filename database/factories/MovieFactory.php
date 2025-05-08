<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\MovieGenre;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'poster' => $this->faker->imageUrl(640, 960, 'movie'),
            'trailer_url' => $this->faker->url(),
            'duration' => $this->faker->numberBetween(60, 180), // Duration between 1-3 hours
            'release_year' => $this->faker->year(),
            'category_id' => MovieCategory::inRandomOrder()->first()->id,
            'genre_id' => MovieGenre::inRandomOrder()->first()->id,
            'is_active' => true,
        ];
    }
}
