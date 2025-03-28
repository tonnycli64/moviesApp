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
        // database/migrations/YYYY_MM_DD_create_payment_gateways_table.php
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Stripe, PayPal, etc.
            $table->string('slug')->unique(); // stripe, paypal
            $table->boolean('is_active')->default(true);
            $table->decimal('transaction_fee', 5, 2)->default(0); // Percentage fee
            $table->json('credentials')->nullable(); // Encrypted API keys
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
