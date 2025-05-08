<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DirectorSeeder extends Seeder
{
    public function run()
    {
        $directors = [
            [
                'name' => 'Steven Spielberg',
                'biography' => 'Steven Allan Spielberg is an American film director, producer, and screenwriter. A major figure of the New Hollywood era, he is the most commercially successful director of all time.',
                'birth_date' => '1946-12-18',
                'birth_place' => 'Cincinnati, Ohio, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTY1NjAzNzE1MV5BMl5BanBnXkFtZTYwNTk0ODc0._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Christopher Nolan',
                'biography' => 'Christopher Edward Nolan is a British-American film director, producer, and screenwriter. His films have grossed more than $5 billion worldwide, and have garnered 11 Academy Awards from 36 nominations.',
                'birth_date' => '1970-07-30',
                'birth_place' => 'London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BNjE3NDQyOTYyMV5BMl5BanBnXkFtZTcwODcyODU2OQ@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Quentin Tarantino',
                'biography' => 'Quentin Jerome Tarantino is an American film director, screenwriter, producer, and actor. His films are characterized by nonlinear storylines, dark humor, stylized violence, extended dialogue, ensemble casts, and references to popular culture.',
                'birth_date' => '1963-03-27',
                'birth_place' => 'Knoxville, Tennessee, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTgyMjI3ODAxN15BMl5BanBnXkFtZTgwNzY4NjEwMzE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Martin Scorsese',
                'biography' => 'Martin Charles Scorsese is an American film director, producer, screenwriter, and actor. He is the recipient of many accolades, including an Academy Award, three Primetime Emmy Awards, a Grammy Award, four BAFTA Awards, and three Golden Globe Awards.',
                'birth_date' => '1942-11-17',
                'birth_place' => 'New York City, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTcyNDA4Nzk3N15BMl5BanBnXkFtZTcwNDY2ODU2OQ@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'James Cameron',
                'biography' => 'James Francis Cameron is a Canadian filmmaker. A major figure in the post-New Hollywood era, Cameron is considered one of the industry\'s most innovative filmmakers, regularly pushing the boundaries of cinematic capability with technology.',
                'birth_date' => '1954-08-16',
                'birth_place' => 'Kapuskasing, Ontario, Canada',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjI0MjMzOTg0MF5BMl5BanBnXkFtZTgwMTMzNTQ4NDE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ]
        ];

        foreach ($directors as $director) {
            $director['slug'] = Str::slug($director['name']);
            Director::create($director);
        }
    }
}
