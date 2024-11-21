<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Cnpj implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cnpj = preg_replace('/\D/', '', $value);
        if (strlen($cnpj) != 14) {
            $fail('The :attribute deve ter 14 numeros.');
        }
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            $fail('The :attribute possui muitos numeros repetidos.');
        }

        // $weights = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        // for ($t = 12; $t < 14; $t++) {
        //     $sum = 0;
        //     for ($i = 0; $i < $t; $i++) {
        //         $sum += $cnpj[$i] * $weights[$i];
        //     }
        //     $digit = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);
        //     if ($cnpj[$t] != $digit) {
        //         $fail('The :attribute possui digitos verificadores invalidos.');
        //     }
        // }


    }
}
