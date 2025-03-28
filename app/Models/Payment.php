<?php
 
// app/Models/Payment.php
namespace App\Models;

use App\Enums\PaymentStatus;
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
        'status' => PaymentStatus::class,
        'metadata' => 'array',
        'amount' => 'decimal:2',
    ];

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }

    public function gateway(): BelongsTo
    {
        return $this->belongsTo(PaymentGateway::class);
    }
}