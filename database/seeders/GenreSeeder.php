<?php

namespace Database\Seeders;

use App\Models\MovieGenre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            'Action',
            'Adventure',
            'Animation',
            'Biography',
            'Comedy',
            'Crime',
            'Drama',
            'Family',
            'Fantasy',
            'Horror',
            'Mystery',
            'Romance',
            'Sci-Fi',
            'Thriller',
            'War',
            'Western',
            'Musical',
            'Sport',
            'Superhero',
            'Historical'
        ];

        foreach ($genres as $genre) {
            MovieGenre::firstOrCreate(
                ['name' => $genre],
                [
                    'slug' => Str::slug($genre),
                    'is_active' => true
                ]
            );
        }

        // Create additional random genres using factory if we have less than 30 genres
        if (MovieGenre::count() < 30) {
            MovieGenre::factory()->count(10)->create();
        }
    }
}
