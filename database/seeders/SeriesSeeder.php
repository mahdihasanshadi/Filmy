<?php

namespace Database\Seeders;

use App\Models\Series;
use App\Models\MovieGenre;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    public function run()
    {
        $series = [
            [
                'title' => 'Breaking Bad',
                'description' => 'A high school chemistry teacher turned methamphetamine manufacturer partners with a former student to secure his family\'s financial future.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BYmQ4YWMxYjUtNjZmYi00MDQ1LWFjMjMtNjA5ZDdiYjFmZGQ3XkEyXkFqcGdeQXVyMTMzNDExODE5._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=HhesaQXLuRY',
                'release_year' => 2008,
                'genre' => 'Drama',
                'actors' => ['Bryan Cranston', 'Aaron Paul'],
                'directors' => ['Vince Gilligan']
            ],
            [
                'title' => 'Game of Thrones',
                'description' => 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BYTRiNDQwYzAtMzVlZS00NTI5LWJjYjUtMzkwNTUzMWMxZTllXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=KPLWWIOCOOQ',
                'release_year' => 2011,
                'genre' => 'Fantasy',
                'actors' => ['Emilia Clarke', 'Kit Harington'],
                'directors' => ['David Benioff', 'D.B. Weiss']
            ],
            [
                'title' => 'Stranger Things',
                'description' => 'When a young boy disappears, his mother, a police chief and his friends must confront terrifying supernatural forces in order to get him back.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMDZkYmVhNjMtNWU4MC00MDQxLWE3MjYtZGMzZWI1ZjhlOWJmXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=b9EkMc79ZSU',
                'release_year' => 2016,
                'genre' => 'Sci-Fi',
                'actors' => ['Millie Bobby Brown', 'Finn Wolfhard'],
                'directors' => ['The Duffer Brothers']
            ],
            [
                'title' => 'The Office',
                'description' => 'A mockumentary on a group of typical office workers, where the workday consists of ego clashes, inappropriate behavior, and tedium.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMDNkOTE4NDQtMTNmYi00MWE0LWE4ZTktYTc0NzhhNWIzNzJiXkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=LHOtME2DL4g',
                'release_year' => 2005,
                'genre' => 'Comedy',
                'actors' => ['Steve Carell', 'Rainn Wilson'],
                'directors' => ['Greg Daniels']
            ],
            [
                'title' => 'The Mandalorian',
                'description' => 'The travels of a lone bounty hunter in the outer reaches of the galaxy, far from the authority of the New Republic.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BZjRlZDIyNDMtZjYzYS00ZmQ4LTk2NmItM2MxZjlmMDNhNjUyXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=aOC8E8z_ifw',
                'release_year' => 2019,
                'genre' => 'Sci-Fi',
                'actors' => ['Pedro Pascal', 'Giancarlo Esposito'],
                'directors' => ['Jon Favreau']
            ],
            [
                'title' => 'Friends',
                'description' => 'Follows the personal and professional lives of six twenty to thirty-something-year-old friends living in Manhattan.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BNDVkYjU0MzctMWRmZi00NTkxLTgwZWEtOWVhYjZlYjllYmU4XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=hDNNmeeJs1Q',
                'release_year' => 1994,
                'genre' => 'Comedy',
                'actors' => ['Jennifer Aniston', 'Courteney Cox', 'Lisa Kudrow', 'Matt LeBlanc', 'Matthew Perry', 'David Schwimmer'],
                'directors' => ['David Crane', 'Marta Kauffman']
            ],
            [
                'title' => 'The Crown',
                'description' => 'Follows the political rivalries and romance of Queen Elizabeth II\'s reign and the events that shaped the second half of the twentieth century.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BZmY0MzBlNjctNTRmNy00Njk3LWFjMzctMWQwZDAwMGJmY2MyXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=JWtnJjn6ng0',
                'release_year' => 2016,
                'genre' => 'Drama',
                'actors' => ['Claire Foy', 'Matt Smith'],
                'directors' => ['Peter Morgan']
            ],
            [
                'title' => 'The Walking Dead',
                'description' => 'Sheriff Deputy Rick Grimes wakes up from a coma to learn the world is in ruins and must lead a group of survivors to stay alive.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BZmU5NTcwNjktODIwMi00ZmZkLTk4ZWUtYzVjZWQ5ZTZjN2RlXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=R1v0uFms68U',
                'release_year' => 2010,
                'genre' => 'Horror',
                'actors' => ['Andrew Lincoln', 'Norman Reedus'],
                'directors' => ['Frank Darabont']
            ],
            [
                'title' => 'Westworld',
                'description' => 'At a high-tech amusement park, visitors interact with automatons in scenarios that are developed, overseen and scripted by the park\'s creative, security and quality control staff.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BZDg1OWRiMTktZDdiNy00NTZlLTg2Y2EtNWRiMTcxMGE5YTUxXkEyXkFqcGdeQXVyMTM2MDY0OTYx._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=9BqKiZhEFFw',
                'release_year' => 2016,
                'genre' => 'Sci-Fi',
                'actors' => ['Evan Rachel Wood', 'Thandie Newton'],
                'directors' => ['Jonathan Nolan', 'Lisa Joy']
            ],
            [
                'title' => 'This Is Us',
                'description' => 'A heartwarming and emotional story about a unique set of triplets, their struggles and their wonderful parents.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BYjNlOWY2OWEtMGQyOC00YWQ4LWJkMjUtYzU4NGEzNjM2MWY0XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=htu5UHjpzkM',
                'release_year' => 2016,
                'genre' => 'Drama',
                'actors' => ['Milo Ventimiglia', 'Mandy Moore'],
                'directors' => ['Ken Olin']
            ]
        ];

        foreach ($series as $seriesData) {
            // Get actors and directors if they exist, otherwise set to empty arrays
            $actors = $seriesData['actors'] ?? [];
            $directors = $seriesData['directors'] ?? [];

            // Remove actors and directors from series data
            unset($seriesData['actors'], $seriesData['directors']);

            $genre = MovieGenre::where('name', $seriesData['genre'])->first();
            unset($seriesData['genre']);

            $series = Series::create([
                'title' => $seriesData['title'],
                'description' => $seriesData['description'],
                'poster' => $seriesData['poster'],
                'trailer_url' => $seriesData['trailer_url'],
                'release_year' => $seriesData['release_year'],
                'genre_id' => $genre->id,
                'is_active' => true
            ]);

            // Attach actors if they exist
            foreach ($actors as $actorName) {
                $actor = Actor::where('name', $actorName)->first();
                if ($actor) {
                    $series->actors()->attach($actor->id);
                }
            }

            // Attach directors if they exist
            foreach ($directors as $directorName) {
                $director = Director::where('name', $directorName)->first();
                if ($director) {
                    $series->directors()->attach($director->id);
                }
            }
        }
    }
}
