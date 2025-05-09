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
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminUserSeeder::class,
            GenreSeeder::class,
            // MovieCategorySeeder::class, // Skipping since we removed categories
            MovieSeeder::class,
            SeriesSeeder::class,
            SeasonEpisodeSeeder::class,
            ActorSeeder::class,
            DirectorSeeder::class,
            ActorConnectionSeeder::class,
            DirectorConnectionSeeder::class,
        ]);
    }
}
