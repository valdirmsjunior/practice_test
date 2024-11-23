<?php

namespace App\Http\Requests\Api\Caminhao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCaminhaoRequest extends BaseCaminhaoRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'placa_caminhao' => ['required','sometimes','string',Rule::unique('caminhoes')->ignore($this->caminhao)],
            'motorista_id' => 'required|sometimes|exists:motoristas,id',
            'modelo_id' => 'required|sometimes|exists:modelos,id',
        ];
    }
}
