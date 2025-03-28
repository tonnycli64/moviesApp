<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gateways = [
            [
                'name' => 'Stripe',
                'slug' => 'stripe',
                'is_active' => true,
                'transaction_fee' => 2.9,
                'credentials' => json_encode([
                    'api_key' => 'sk_test_'.Str::random(24),
                    'secret' => 'sk_live_'.Str::random(24)
                ]),
                'webhook_secret' => Str::random(32),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PayPal',
                'slug' => 'paypal',
                'is_active' => true,
                'transaction_fee' => 3.5,
                'credentials' => json_encode([
                    'client_id' => 'paypal_client_'.Str::random(24),
                    'secret' => 'paypal_secret_'.Str::random(24)
                ]),
                'webhook_secret' => Str::random(32),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Flutterwave',
                'slug' => 'flutterwave',
                'is_active' => false,
                'transaction_fee' => 1.4,
                'credentials' => json_encode([
                    'public_key' => 'FLW_PUBLIC_'.Str::random(24),
                    'secret_key' => 'FLW_SECRET_'.Str::random(24)
                ]),
                'webhook_secret' => Str::random(32),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('payment_gateways')->insert($gateways);
    }
}
