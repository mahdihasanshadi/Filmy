<?php

namespace Database\Factories;

use App\Models\MovieGenre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovieGenreFactory extends Factory
{
    protected $model = MovieGenre::class;

    public function definition()
    {
        $name = $this->faker->unique()->words(rand(1, 2), true);
        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'is_active' => true,
        ];
    }
}
