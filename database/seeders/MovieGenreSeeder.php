<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all movies and genres
        $movies = DB::table('movies')->pluck('id');
        $genres = DB::table('genres')->pluck('id');

        foreach ($movies as $movie) {
            // Assign 1 to 3 random genres per movie
            $assignedGenres = $genres->random(rand(1, 3));

            foreach ($assignedGenres as $genre) {
                DB::table('movie_genre')->insert([
                    'movie_id' => $movie,
                    'genre_id' => $genre,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}