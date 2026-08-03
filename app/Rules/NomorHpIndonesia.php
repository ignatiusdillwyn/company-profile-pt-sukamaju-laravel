<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

// Contoh Custom Validation Rule (Laravel 10+/12 style: implements ValidationRule).
// Aturan: nomor HP Indonesia harus diawali "08" dan panjang 10-13 digit angka.
class NomorHpIndonesia implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value) || ! preg_match('/^08[0-9]{8,11}$/', $value)) {
            $fail('Kolom :attribute harus berupa nomor HP Indonesia yang valid (diawali 08, 10-13 digit).');
        }
    }
}
