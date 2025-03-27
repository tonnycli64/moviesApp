<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title' => 'The Dark Knight',
                'slug' => Str::slug('The Dark Knight'),
                'description' => 'A gripping action-packed Batman movie.',
                'price' => 9.99,
                'cover_image' => 'dark-knight.jpg',
                'hosting_type' => 'vimeo',
                'video_path' => null,
                'external_id' => '12345678',
                'streaming_url' => 'https://vimeo.com/12345678',
                'trailer_url' => 'https://youtube.com/watch?v=EXeTwQWrcwY',
                'duration_minutes' => 152,
                'release_date' => Carbon::parse('2008-07-18'),
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,

            ],
            [
                'title' => 'Avengers: Endgame',
                'slug' => Str::slug('Avengers: Endgame'),
                'description' => 'The epic conclusion to the Infinity Saga.',
                'price' => 14.99,
                'cover_image' => 'avengers-endgame.jpg',
                'hosting_type' => 'youtube',
                'video_path' => null,
                'external_id' => '9OQBDd74xzA',
                'streaming_url' => 'https://youtube.com/watch?v=9OQBDd74xzA',
                'trailer_url' => 'https://youtube.com/watch?v=TcMBFSGVi1c',
                'duration_minutes' => 181,
                'release_date' => Carbon::parse('2019-04-26'),
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,

            ],
            [
                'title' => 'Interstellar',
                'slug' => Str::slug('Interstellar'),
                'description' => 'A sci-fi masterpiece about space and time.',
                'price' => 12.50,
                'cover_image' => 'interstellar.jpg',
                'hosting_type' => 'aws',
                'video_path' => null,
                'external_id' => null,
                'streaming_url' => 'https://s3.amazonaws.com/movies/interstellar.mp4',
                'trailer_url' => 'https://youtube.com/watch?v=zSWdZVtXT7E',
                'duration_minutes' => 169,
                'release_date' => Carbon::parse('2014-11-07'),
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
