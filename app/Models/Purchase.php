<?php

// app/Models/Purchase.php
namespace App\Models;

use App\Enums\PurchaseStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Purchase extends Model
{
    protected $fillable = [
        'user_id', 'movie_id', 'amount', 
        'payment_method', 'status'
    ];


    protected $casts = [
        'status' => PurchaseStatus::class,
        'amount' => 'decimal:2',
        'refund_amount' => 'decimal:2',
        'refunded_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}