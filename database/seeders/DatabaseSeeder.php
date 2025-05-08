<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            GenreSeeder::class,
            MovieCategorySeeder::class,
            ActorSeeder::class,
            DirectorSeeder::class,
            MovieSeeder::class,
            SeriesSeeder::class,
            SeasonEpisodeSeeder::class,
            ActorConnectionSeeder::class,
            DirectorConnectionSeeder::class,
        ]);
    }
}
