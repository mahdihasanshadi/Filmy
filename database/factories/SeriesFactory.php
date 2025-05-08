<?php

namespace Database\Factories;

use App\Models\Series;
use App\Models\MovieCategory;
use App\Models\MovieGenre;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeriesFactory extends Factory
{
    protected $model = Series::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'poster' => $this->faker->imageUrl(640, 960, 'series'),
            'trailer_url' => $this->faker->url(),
            'release_year' => $this->faker->year(),
            'category_id' => MovieCategory::inRandomOrder()->first()->id,
            'genre_id' => MovieGenre::inRandomOrder()->first()->id,
            'is_active' => true,
        ];
    }
}
