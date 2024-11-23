<?php

namespace App\Http\Requests\Api\Motorista;

use Illuminate\Foundation\Http\FormRequest;

class BaseMotoristaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'nome_motorista' => 'Nome',
            'cpf_motorista' => 'CPF',
            'data_nascimento_motorista' => 'Data de Nascimento',
            'email_motorista' => 'Email'
        ];
    }
}
