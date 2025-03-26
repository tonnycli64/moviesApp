<?php


use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Seeder;


class PaymentGatewaySeeder extends Seeder
{
    public function run()
    {
        PaymentGateway::create([
            'name' => 'Stripe',
            'slug' => 'stripe',
            'is_active' => true,
            'credentials' => [
                'key' => Crypt::encrypt(env('STRIPE_KEY')),
                'secret' => Crypt::encrypt(env('STRIPE_SECRET')),
            ],
            'transaction_fee' => 2.9, // 2.9%
            'webhook_secret' => Crypt::encrypt(env('STRIPE_WEBHOOK_SECRET'))
        ]);

        PaymentGateway::create([
            'name' => 'PayPal',
            'slug' => 'paypal',
            'is_active' => true,
            'credentials' => [
                'client_id' => Crypt::encrypt(env('PAYPAL_CLIENT_ID')),
                'secret' => Crypt::encrypt(env('PAYPAL_SECRET')),
            ],
            'transaction_fee' => 3.4 // 3.4%
        ]);
    }
}

