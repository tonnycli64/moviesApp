<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Clinton',
            'email' => 'tonnycli64@gmail.com',
            'password' => Hash::make('11111111'), // Encrypt the password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}