<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;
use App\Models\Movie;
use App\Models\Series;

class DirectorConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all directors
        $directors = Director::all();

        // Get all movies and series
        $movies = Movie::all();
        $series = Series::all();

        // Connect directors to movies
        foreach ($movies as $movie) {
            // Get existing director connections
            $existingDirectors = $movie->directors()->pluck('directors.id')->toArray();

            // Get available directors (excluding already connected ones)
            $availableDirectors = $directors->whereNotIn('id', $existingDirectors);

            if ($availableDirectors->count() > 0) {
                // Randomly select 1-2 directors for each movie
                $numDirectors = min(rand(1, 2), $availableDirectors->count());
                $selectedDirectors = $availableDirectors->random($numDirectors);

                foreach ($selectedDirectors as $director) {
                    $movie->directors()->attach($director->id);
                }
            }
        }

        // Connect directors to series
        foreach ($series as $series) {
            // Get existing director connections
            $existingDirectors = $series->directors()->pluck('directors.id')->toArray();

            // Get available directors (excluding already connected ones)
            $availableDirectors = $directors->whereNotIn('id', $existingDirectors);

            if ($availableDirectors->count() > 0) {
                // Randomly select 1-2 directors for each series
                $numDirectors = min(rand(1, 2), $availableDirectors->count());
                $selectedDirectors = $availableDirectors->random($numDirectors);

                foreach ($selectedDirectors as $director) {
                    $series->directors()->attach($director->id);
                }
            }
        }
    }
}
