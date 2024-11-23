<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPlaca implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $placaAntiga = '/^[A-Z]{3}-\d{4}$/';
        $placaMercosul = '/^[A-Z]{3}\d[A-Z]\d{2}$/';

        if (!preg_match($placaAntiga, $value) && !preg_match($placaMercosul, $value)) {
            $fail('O campo :attribute deve ser uma placa válida no formato antigo (ABC-1234) ou Mercosul (ABC1D23).');
        }
    }

    

}
