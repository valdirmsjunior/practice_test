<?php

namespace App\Http\Requests\Api\Transportadora;

use Illuminate\Foundation\Http\FormRequest;

class BaseTransportadoraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'nome_transportadora' => 'Nome',
            'cnpj_transportadora' => 'CNPJ',
            'status_transportadora' => 'Status',
        ];
    }

}
