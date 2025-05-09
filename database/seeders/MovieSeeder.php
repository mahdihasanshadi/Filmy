<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BNDE3ODcxYzMtY2YzZC00NmNlLWJiNDMtZDViZWM2MzIxZDYwXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=NmzuHjWmXOc',
                'duration' => 142,
                'release_year' => 1994,
                'genre' => 'Drama',
                'actors' => ['Morgan Freeman', 'Tim Robbins'],
                'directors' => ['Frank Darabont']
            ],
            [
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=sY1S34973zA',
                'duration' => 175,
                'release_year' => 1972,
                'genre' => 'Crime',
                'actors' => ['Marlon Brando', 'Al Pacino'],
                'directors' => ['Francis Ford Coppola']
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=YoHD9XEInc0',
                'duration' => 148,
                'release_year' => 2010,
                'genre' => 'Sci-Fi',
                'actors' => ['Leonardo DiCaprio', 'Tom Hardy'],
                'directors' => ['Christopher Nolan']
            ],
            [
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=EXeTwQWrcwY',
                'duration' => 152,
                'release_year' => 2008,
                'genre' => 'Action',
                'actors' => ['Christian Bale', 'Heath Ledger'],
                'directors' => ['Christopher Nolan']
            ],
            [
                'title' => 'Pulp Fiction',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=s7EdQ4FqbhY',
                'duration' => 154,
                'release_year' => 1994,
                'genre' => 'Crime',
                'actors' => ['John Travolta', 'Samuel L. Jackson'],
                'directors' => ['Quentin Tarantino']
            ],
            [
                'title' => 'Forrest Gump',
                'description' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=bLvqoHBptjg',
                'duration' => 142,
                'release_year' => 1994,
                'genre' => 'Drama',
                'actors' => ['Tom Hanks', 'Robin Wright'],
                'directors' => ['Robert Zemeckis']
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A computer programmer discovers that reality as he knows it is a simulation created by machines, and joins a rebellion to break free from it.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BNzQzOTk3OTAtNDQ0Zi00ZTVkLWI0MTEtMDllZjNkYzNjNTc4L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=vKQi3bBA1y8',
                'duration' => 136,
                'release_year' => 1999,
                'genre' => 'Sci-Fi',
                'actors' => ['Keanu Reeves', 'Laurence Fishburne'],
                'directors' => ['Lana Wachowski', 'Lilly Wachowski']
            ],
            [
                'title' => 'Schindler\'s List',
                'description' => 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BNDE4OTMxMTctNmRhYy00NWE2LTg3YzItYTk3M2UwOTU5Njg4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=gG22XNhtnoY',
                'duration' => 195,
                'release_year' => 1993,
                'genre' => 'Drama',
                'actors' => ['Liam Neeson', 'Ralph Fiennes'],
                'directors' => ['Steven Spielberg']
            ],
            [
                'title' => 'Jurassic Park',
                'description' => 'A pragmatic paleontologist touring an almost complete theme park on an island in Central America is tasked with protecting a couple of kids after a power failure causes the park\'s cloned dinosaurs to run loose.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMjM2MDgxMDg0Nl5BMl5BanBnXkFtZTgwNTM2OTM5NDE@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=QWBKEmWWL38',
                'duration' => 127,
                'release_year' => 1993,
                'genre' => 'Adventure',
                'actors' => ['Sam Neill', 'Laura Dern'],
                'directors' => ['Steven Spielberg']
            ],
            [
                'title' => 'The Lion King',
                'description' => 'Lion prince Simba and his father are targeted by his bitter uncle, who wants to ascend the throne himself.',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BYTYxNGMyZTYtMjE3MS00MzNjLWFjNmYtMDk3N2FmM2JiM2M1XkEyXkFqcGdeQXVyNjY5NDU4NzI@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=4sj1MT05lAA',
                'duration' => 88,
                'release_year' => 1994,
                'genre' => 'Animation',
                'actors' => ['Matthew Broderick', 'James Earl Jones'],
                'directors' => ['Roger Allers', 'Rob Minkoff']
            ]
        ];

        foreach ($movies as $movieData) {
            $actors = $movieData['actors'];
            $directors = $movieData['directors'];
            unset($movieData['actors'], $movieData['directors']);

            $genre = MovieGenre::where('name', $movieData['genre'])->first();

            $movie = Movie::create([
                'title' => $movieData['title'],
                'description' => $movieData['description'],
                'poster' => $movieData['poster'],
                'trailer_url' => $movieData['trailer_url'],
                'duration' => $movieData['duration'],
                'release_year' => $movieData['release_year'],
                'is_active' => true
            ]);

            // Attach genre
            if ($genre) {
                $movie->genres()->attach($genre->id);
            }

            // Attach actors
            foreach ($actors as $actorName) {
                $actor = Actor::where('name', $actorName)->first();
                if ($actor) {
                    $movie->actors()->attach($actor->id);
                }
            }

            // Attach directors
            foreach ($directors as $directorName) {
                $director = Director::where('name', $directorName)->first();
                if ($director) {
                    $movie->directors()->attach($director->id);
                }
            }
        }
    }
}
