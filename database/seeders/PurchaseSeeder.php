<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->pluck('id');
        $movies = DB::table('movies')->pluck('id');
        $paymentMethods = ['M-Pesa', 'Credit Card', 'PayPal', 'Bitcoin'];
        $statuses = ['pending', 'completed', 'failed'];

        foreach ($users as $user) {
            // Each user makes 1 to 3 random purchases
            $purchases = $movies->random(rand(1, 3));

            foreach ($purchases as $movie) {
                DB::table('purchases')->insert([
                    'user_id' => $user,
                    'movie_id' => $movie,
                    'amount' => rand(500, 2000) / 100, // Random price between 5.00 - 20.00
                    'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                    'status' => $statuses[array_rand($statuses)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}