<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $purchases = DB::table('purchases')->pluck('id');
        $gateways = DB::table('payment_gateways')->pluck('id');
        $statuses = ['Pending', 'Completed', 'Failed'];

        foreach ($purchases as $purchase) {
            DB::table('payments')->insert([
                'purchase_id' => $purchase,
                'gateway_id' => $gateways->random(),
                'transaction_id' => strtoupper(Str::random(15)),
                'amount' => rand(1000, 5000) / 100, // Random amount between 10.00 - 50.00
                'currency' => 'USD',
                'status' => $statuses[array_rand($statuses)],
                'metadata' => json_encode(['note' => 'Test payment for seeding']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
