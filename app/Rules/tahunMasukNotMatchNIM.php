<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class tahunMasukNotMatchNIM implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $nimTahunMasuk = substr($value, 2, 2);
        if ($nimTahunMasuk != substr(request()->input('nim'), 6, 2)) {
            $fail('tahun tidak sama seperti nim.');
        }
    }
}
