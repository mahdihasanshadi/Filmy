<?php

namespace Database\Seeders;

use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Database\Seeder;

class SeasonEpisodeSeeder extends Seeder
{
    public function run()
    {
        // Breaking Bad Seasons and Episodes
        $breakingBad = Series::where('title', 'Breaking Bad')->first();
        if ($breakingBad) {
            $season1 = Season::create([
                'title' => 'Season 1',
                'description' => 'The first season of Breaking Bad introduces Walter White, a high school chemistry teacher who turns to manufacturing and selling methamphetamine after being diagnosed with terminal lung cancer.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMTQ0NDc1MDQwNl5BMl5BanBnXkFtZTcwNjkxNTE2OQ@@._V1_.jpg',
                'season_number' => 1,
                'release_year' => 2008,
                'series_id' => $breakingBad->id,
                'is_active' => true
            ]);

            // Breaking Bad Season 1 Episodes
            $episodes = [
                [
                    'title' => 'Pilot',
                    'description' => 'Walter White, a high school chemistry teacher, is diagnosed with terminal lung cancer. He teams up with former student Jesse Pinkman to cook and sell crystal meth.',
                    'thumbnail' => 'https://m.media-amazon.com/images/M/MV5BMTQ0NDc1MDQwNl5BMl5BanBnXkFtZTcwNjkxNTE2OQ@@._V1_.jpg',
                    'video_url' => 'https://www.youtube.com/watch?v=HhesaQXLuRY',
                    'episode_number' => 1,
                    'duration' => 58,
                    'season_id' => $season1->id,
                    'is_active' => true
                ],
                [
                    'title' => 'Cat\'s in the Bag...',
                    'description' => 'Walter and Jesse try to dispose of two bodies, but things get complicated when one of them isn\'t quite dead.',
                    'thumbnail' => 'https://m.media-amazon.com/images/M/MV5BMTQ0NDc1MDQwNl5BMl5BanBnXkFtZTcwNjkxNTE2OQ@@._V1_.jpg',
                    'video_url' => 'https://www.youtube.com/watch?v=HhesaQXLuRY',
                    'episode_number' => 2,
                    'duration' => 48,
                    'season_id' => $season1->id,
                    'is_active' => true
                ]
            ];

            foreach ($episodes as $episode) {
                Episode::create($episode);
            }
        }

        // Game of Thrones Seasons and Episodes
        $gameOfThrones = Series::where('title', 'Game of Thrones')->first();
        if ($gameOfThrones) {
            $season1 = Season::create([
                'title' => 'Season 1',
                'description' => 'The first season of Game of Thrones follows the story of several noble houses in the fictional land of Westeros as they vie for control of the Iron Throne.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BYTRiNDQwYzAtMzVlZS00NTI5LWJjYjUtMzkwNTUzMWMxZTllXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_.jpg',
                'season_number' => 1,
                'release_year' => 2011,
                'series_id' => $gameOfThrones->id,
                'is_active' => true
            ]);

            // Game of Thrones Season 1 Episodes
            $episodes = [
                [
                    'title' => 'Winter Is Coming',
                    'description' => 'Ned Stark, Lord of Winterfell, is asked to become the Hand of the King after the suspicious death of the previous Hand.',
                    'thumbnail' => 'https://m.media-amazon.com/images/M/MV5BMTQ0NDc1MDQwNl5BMl5BanBnXkFtZTcwNjkxNTE2OQ@@._V1_.jpg',
                    'video_url' => 'https://www.youtube.com/watch?v=KPLWWIOCOOQ',
                    'episode_number' => 1,
                    'duration' => 62,
                    'season_id' => $season1->id,
                    'is_active' => true
                ],
                [
                    'title' => 'The Kingsroad',
                    'description' => 'While Bran recovers from his fall, Ned takes the girls to King\'s Landing. Jon Snow goes with his uncle Benjen to the Wall.',
                    'thumbnail' => 'https://m.media-amazon.com/images/M/MV5BMTQ0NDc1MDQwNl5BMl5BanBnXkFtZTcwNjkxNTE2OQ@@._V1_.jpg',
                    'video_url' => 'https://www.youtube.com/watch?v=KPLWWIOCOOQ',
                    'episode_number' => 2,
                    'duration' => 56,
                    'season_id' => $season1->id,
                    'is_active' => true
                ]
            ];

            foreach ($episodes as $episode) {
                Episode::create($episode);
            }
        }

        // Stranger Things Seasons and Episodes
        $strangerThings = Series::where('title', 'Stranger Things')->first();
        if ($strangerThings) {
            $season1 = Season::create([
                'title' => 'Season 1',
                'description' => 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying supernatural forces in order to get him back.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMDZkYmVhNjMtNWU4MC00MDQxLWE3MjYtZGMzZWI1ZjhlOWJmXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg',
                'season_number' => 1,
                'release_year' => 2016,
                'series_id' => $strangerThings->id,
                'is_active' => true
            ]);

            // Stranger Things Season 1 Episodes
            $episodes = [
                [
                    'title' => 'Chapter One: The Vanishing of Will Byers',
                    'description' => 'On his way home from a friend\'s house, young Will sees something terrifying. Nearby, a sinister secret lurks in the depths of a government lab.',
                    'thumbnail' => 'https://m.media-amazon.com/images/M/MV5BMDZkYmVhNjMtNWU4MC00MDQxLWE3MjYtZGMzZWI1ZjhlOWJmXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg',
                    'video_url' => 'https://www.youtube.com/watch?v=b9EkMc79ZSU',
                    'episode_number' => 1,
                    'duration' => 49,
                    'season_id' => $season1->id,
                    'is_active' => true
                ],
                [
                    'title' => 'Chapter Two: The Weirdo on Maple Street',
                    'description' => 'Lucas, Mike and Dustin try to talk to the girl they found in the woods. Hopper questions an anxious Joyce about an unsettling phone call.',
                    'thumbnail' => 'https://m.media-amazon.com/images/M/MV5BMDZkYmVhNjMtNWU4MC00MDQxLWE3MjYtZGMzZWI1ZjhlOWJmXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg',
                    'video_url' => 'https://www.youtube.com/watch?v=b9EkMc79ZSU',
                    'episode_number' => 2,
                    'duration' => 55,
                    'season_id' => $season1->id,
                    'is_active' => true
                ]
            ];

            foreach ($episodes as $episode) {
                Episode::create($episode);
            }
        }
    }
}
