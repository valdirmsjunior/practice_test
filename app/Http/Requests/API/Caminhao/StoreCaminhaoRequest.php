<?php

namespace App\Http\Requests\Api\Caminhao;

use App\Rules\ValidPlaca;
use Illuminate\Foundation\Http\FormRequest;

class StoreCaminhaoRequest extends BaseCaminhaoRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'placa_caminhao' => ['required', 'string', new ValidPlaca(), 'unique:caminhoes,placa_caminhao'],
            'motorista_id' => 'required|exists:motoristas,id',
            'modelo_id' => 'required|exists:modelos,id',
        ];
    }
}
