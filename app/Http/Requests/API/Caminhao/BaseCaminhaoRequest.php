<?php

namespace App\Http\Requests\Api\Caminhao;

use Illuminate\Foundation\Http\FormRequest;

class BaseCaminhaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'placa_caminhao' => 'Placa',
            'motorista_id' => 'Motorista',
            'modelo_id' => 'Modelo',
        ];
    }
}
