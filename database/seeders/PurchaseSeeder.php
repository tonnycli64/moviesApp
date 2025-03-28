<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->pluck('id');
        $movies = DB::table('movies')->pluck('id');
        $statuses = ['Pending', 'Completed', 'Failed', 'Refunded'];

        foreach ($users as $user) {
            DB::table('purchases')->insert([
                'user_id' => $user,
                'movie_id' => $movies->random(),
                'amount' => rand(1000, 5000) / 100, // Random amount between 10.00 - 50.00
                'currency' => 'USD',
                'status' => $status = $statuses[array_rand($statuses)],

                // Refund details if status is refunded
                'refund_amount' => $status === 'refunded' ? rand(500, 5000) / 100 : null,
                'refund_reason' => $status === 'refunded' ? 'User requested refund' : null,
                'refunded_at' => $status === 'refunded' ? Carbon::now() : null,

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
