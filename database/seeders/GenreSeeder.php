<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genreData = [
            [
                'genre_name' => 'Action',
            ],
            [
                'genre_name' => 'Adventure',
            ],
            [
                'genre_name' => 'Comedy',
            ],
            [
                'genre_name' => 'Drama',
            ],
            [
                'genre_name' => 'Fantasy',
            ],
            [
                'genre_name' => 'Magic',
            ],
            [
                'genre_name' => 'Mystery',
            ],
            [
                'genre_name' => 'Psychological',
            ],
            [
                'genre_name' => 'Romance',
            ],
            [
                'genre_name' => 'Sci-Fi',
            ],
            [
                'genre_name' => 'Slice of Life',
            ],
            [
                'genre_name' => 'Sports',
            ],
            [
                'genre_name' => 'Supernatural',
            ],
            [
                'genre_name' => 'Horror',
            ]
        ];

        DB::table('genres')->insert($genreData);
    }
}
