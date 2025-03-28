<?php

use App\Enums\PaymentStatus;
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
        // database/migrations/YYYY_MM_DD_create_payments_table.php
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            
            // Link to purchase
            $table->foreignId('purchase_id')->constrained()->cascadeOnDelete();
            
            // Payment gateway used
            $table->foreignId('gateway_id')->constrained('payment_gateways');
            
            // Transaction details
            $table->string('transaction_id')->unique();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->string('status')->default(PaymentStatus::PENDING->value);
            $table->json('metadata')->nullable(); // Raw response from gateway
            
            $table->timestamps();
            
            // Indexes
            $table->index('purchase_id');
            $table->index('gateway_id');
            $table->index('transaction_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
