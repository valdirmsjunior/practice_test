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
        if (!$this->isValidCnpj($value)) {
            $fail('O :attribute não é um CNPJ válido.');
        }
    }

    protected function isValidCnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        if (preg_match('/(\d)\1{10}/', $cnpj)) {
            return false;
        }

        return true;
    }
}
