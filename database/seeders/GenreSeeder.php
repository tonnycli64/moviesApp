<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Action',
            'Adventure',
            'Comedy',
            'Drama',
            'Horror',
            'Science Fiction',
            'Fantasy',
            'Thriller',
            'Romance',
            'Mystery'
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'name' => $genre,
                'slug' => Str::slug($genre),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

