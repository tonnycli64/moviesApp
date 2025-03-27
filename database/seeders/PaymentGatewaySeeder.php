<?php
namespace Database\Seeders;


use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Crypt;
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
                'credentials' => json_encode([
                    'public_key' => 'pk_test_123456',
                    'secret_key' => 'sk_test_123456',
                ]),
                'description' => 'Stripe is a secure payment gateway for online transactions.',
                'transaction_fee' => 2.9,
                'webhook_secret' => Str::random(32),
            ],
            [
                'name' => 'PayPal',
                'slug' => 'paypal',
                'is_active' => true,
                'credentials' => json_encode([
                    'client_id' => 'paypal_client_id',
                    'client_secret' => 'paypal_client_secret',
                ]),
                'description' => 'PayPal allows easy and secure payments worldwide.',
                'transaction_fee' => 3.5,
                'webhook_secret' => Str::random(32),
            ],
            [
                'name' => 'Flutterwave',
                'slug' => 'flutterwave',
                'is_active' => true,
                'credentials' => json_encode([
                    'public_key' => 'FLWPUBK_TEST-123456',
                    'secret_key' => 'FLWSECK_TEST-123456',
                ]),
                'description' => 'Flutterwave provides payment processing across Africa.',
                'transaction_fee' => 1.5,
                'webhook_secret' => Str::random(32),
            ]
        ];

        foreach ($gateways as $gateway) {
            DB::table('payment_gateways')->insert([
                'name' => $gateway['name'],
                'slug' => $gateway['slug'],
                'is_active' => $gateway['is_active'],
                'credentials' => $gateway['credentials'],
                'description' => $gateway['description'],
                'transaction_fee' => $gateway['transaction_fee'],
                'webhook_secret' => $gateway['webhook_secret'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

