<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Purchase extends Model
{
    protected $fillable = [
        'user_id', 'movie_id', 'amount', 
        'payment_method', 'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
