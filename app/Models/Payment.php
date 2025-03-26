<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'purchase_id',
        'gateway_id',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'json',
        'amount' => 'decimal:2'
    ];

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }

    public function gateway(): BelongsTo
    {
        return $this->belongsTo(PaymentGateway::class);
    }

    // Helper methods
    public function isSuccessful(): bool
    {
        return $this->status === 'succeeded';
    }

    public function getFormattedAmount(): string
    {
        return number_format($this->amount, 2).' '.strtoupper($this->currency);
    }
}