<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Stripe", "PayPal", "Flutterwave"
            $table->string('slug')->unique(); // e.g., "stripe", "paypal"
            $table->boolean('is_active')->default(true);
            $table->json('credentials')->nullable(); // Encrypted API keys/config
            $table->text('description')->nullable();
            $table->decimal('transaction_fee', 5, 2)->default(0); // Optional fee %
            $table->string('webhook_secret')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
