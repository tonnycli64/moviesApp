<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Crypt;

class PaymentGateway extends Model
{
    protected $fillable = [
        'name', 'slug', 'is_active', 
        'credentials', 'description',
        'transaction_fee', 'webhook_secret'
    ];

    protected $casts = [
        'credentials' => 'array',
        'is_active' => 'boolean',

    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // Helper to decrypt credentials
    public function getDecryptedCredentials()
    {
        return collect($this->credentials)
        ->mapWithKeys(fn ($val, $key) => [
            $key => Crypt::decryptString($val)
        ])
        ->toArray();
    }
}