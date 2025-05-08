<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Series;
use App\Models\Actor;
use Illuminate\Support\Facades\Log;

class ActorConnectionSeeder extends Seeder
{
    public function run(): void
    {
        $connections = [
            'The Shawshank Redemption' => [
                'type' => 'movie',
                'actors' => [
                    'Tim Robbins',
                    'Morgan Freeman',
                    'Bob Gunton',
                    'William Sadler',
                    'Clancy Brown',
                    'Gil Bellows',
                    'Mark Rolston',
                    'James Whitmore'
                ]
            ],
            'The Godfather' => [
                'type' => 'movie',
                'actors' => [
                    'Marlon Brando',
                    'Al Pacino',
                    'James Caan',
                    'Robert Duvall',
                    'Diane Keaton',
                    'John Cazale',
                    'Talia Shire'
                ]
            ],
            'Inception' => [
                'type' => 'movie',
                'actors' => [
                    'Leonardo DiCaprio',
                    'Joseph Gordon-Levitt',
                    'Ellen Page',
                    'Tom Hardy',
                    'Ken Watanabe',
                    'Dileep Rao',
                    'Cillian Murphy',
                    'Tom Berenger',
                    'Michael Caine'
                ]
            ],
            'The Dark Knight' => [
                'type' => 'movie',
                'actors' => [
                    'Christian Bale',
                    'Heath Ledger',
                    'Aaron Eckhart',
                    'Michael Caine',
                    'Gary Oldman',
                    'Morgan Freeman',
                    'Maggie Gyllenhaal'
                ]
            ],
            'Pulp Fiction' => [
                'type' => 'movie',
                'actors' => [
                    'John Travolta',
                    'Samuel L. Jackson',
                    'Uma Thurman',
                    'Bruce Willis',
                    'Ving Rhames',
                    'Tim Roth',
                    'Amanda Plummer',
                    'Maria de Medeiros',
                    'Eric Stoltz',
                    'Rosanna Arquette',
                    'Christopher Walken'
                ]
            ],
            'Forrest Gump' => [
                'type' => 'movie',
                'actors' => [
                    'Tom Hanks',
                    'Robin Wright',
                    'Gary Sinise',
                    'Mykelti Williamson',
                    'Sally Field'
                ]
            ],
            'The Matrix' => [
                'type' => 'movie',
                'actors' => [
                    'Keanu Reeves',
                    'Laurence Fishburne',
                    'Carrie-Anne Moss',
                    'Hugo Weaving',
                    'Joe Pantoliano'
                ]
            ],
            'Schindler\'s List' => [
                'type' => 'movie',
                'actors' => [
                    'Liam Neeson',
                    'Ben Kingsley',
                    'Ralph Fiennes',
                    'Caroline Goodall',
                    'Jonathan Sagall',
                    'Embeth Davidtz'
                ]
            ],
            'Jurassic Park' => [
                'type' => 'movie',
                'actors' => [
                    'Sam Neill',
                    'Laura Dern',
                    'Jeff Goldblum',
                    'Richard Attenborough',
                    'Bob Peck',
                    'Martin Ferrero',
                    'BD Wong'
                ]
            ],
            'The Lion King' => [
                'type' => 'movie',
                'actors' => [
                    'Matthew Broderick',
                    'James Earl Jones',
                    'Jeremy Irons',
                    'Moira Kelly',
                    'Nathan Lane',
                    'Ernie Sabella',
                    'Rowan Atkinson',
                    'Whoopi Goldberg',
                    'Cheech Marin',
                    'Jim Cummings'
                ]
            ],
            'Breaking Bad' => [
                'type' => 'series',
                'actors' => [
                    'Bryan Cranston',
                    'Aaron Paul',
                    'Anna Gunn',
                    'Bob Odenkirk',
                    'Giancarlo Esposito',
                    'Jonathan Banks'
                ]
            ],
            'Game of Thrones' => [
                'type' => 'series',
                'actors' => [
                    'Emilia Clarke',
                    'Kit Harington',
                    'Peter Dinklage',
                    'Lena Headey',
                    'Sophie Turner',
                    'Maisie Williams',
                    'Pedro Pascal'
                ]
            ],
            'Stranger Things' => [
                'type' => 'series',
                'actors' => [
                    'Millie Bobby Brown',
                    'Finn Wolfhard',
                    'Winona Ryder',
                    'David Harbour',
                    'Gaten Matarazzo',
                    'Caleb McLaughlin'
                ]
            ]
        ];

        foreach ($connections as $title => $data) {
            if ($data['type'] === 'movie') {
                $movie = Movie::where('title', $title)->first();
                if (!$movie) {
                    Log::warning("Movie not found: {$title}");
                    continue;
                }

                foreach ($data['actors'] as $actorName) {
                    $actor = Actor::where('name', $actorName)->first();
                    if (!$actor) {
                        Log::warning("Actor not found: {$actorName}");
                        continue;
                    }

                    if (!$movie->actors()->where('actor_id', $actor->id)->exists()) {
                        $movie->actors()->attach($actor->id);
                        Log::info("Connected actor {$actorName} to movie {$title}");
                    }
                }
            } else {
                $series = Series::where('title', $title)->first();
                if (!$series) {
                    Log::warning("Series not found: {$title}");
                    continue;
                }

                foreach ($data['actors'] as $actorName) {
                    $actor = Actor::where('name', $actorName)->first();
                    if (!$actor) {
                        Log::warning("Actor not found: {$actorName}");
                        continue;
                    }

                    if (!$series->actors()->where('actor_id', $actor->id)->exists()) {
                        $series->actors()->attach($actor->id);
                        Log::info("Connected actor {$actorName} to series {$title}");
                    }
                }
            }
        }
    }
}
