<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class RuleFullName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Cek apakah value adalah string
        if (! is_string($value)) {
            $fail('Kolom :attribute harus berupa teks.');
            return;
        }

        // Trim whitespace (hapus spasi di awal dan akhir)
        $value = trim($value);

        // Cek apakah kosong setelah di-trim
        if (empty($value)) {
            $fail('Kolom :attribute tidak boleh kosong.');
            return;
        }

        // Regex: Hanya huruf (termasuk huruf dengan aksen) dan spasi
        // Pattern: ^[\p{L}\s]+$
        // \p{L} = semua huruf (termasuk huruf dengan aksen seperti é, ü, dll)
        // \s = spasi
        if (! preg_match('/^[\p{L}\s]+$/u', $value)) {
            $fail('Kolom :attribute hanya boleh berisi huruf dan spasi.');
            return;
        }

        // Cek apakah ada minimal 2 karakter (setelah trim)
        if (strlen($value) < 2) {
            $fail('Kolom :attribute minimal 2 karakter.');
            return;
        }

        // Cek apakah tidak ada spasi beruntun (opsional)
        if (preg_match('/\s{2,}/', $value)) {
            $fail('Kolom :attribute tidak boleh mengandung spasi beruntun.');
            return;
        }

        // Cek apakah tidak ada spasi di awal atau akhir (sudah di-trim)
        // Cek apakah huruf pertama adalah huruf kapital (opsional)
        // if (! preg_match('/^[A-Z]/', $value)) {
        //     $fail('Kolom :attribute harus dimulai dengan huruf kapital.');
        //     return;
        // }
    }
}