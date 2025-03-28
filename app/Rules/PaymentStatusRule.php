<?php

namespace App\Rules;

use App\Enums\PaymentStatus;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PaymentStatusRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!in_array($value, PaymentStatus::values())) {
            $fail("The {$attribute} must be a valid payment status.");
        }
    }
}