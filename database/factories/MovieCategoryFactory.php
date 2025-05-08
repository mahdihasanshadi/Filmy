<?php

namespace Database\Factories;

use App\Models\MovieCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovieCategoryFactory extends Factory
{
    protected $model = MovieCategory::class;

    public function definition()
    {
        $name = $this->faker->unique()->words(2, true);
        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'is_active' => true,
        ];
    }
}
