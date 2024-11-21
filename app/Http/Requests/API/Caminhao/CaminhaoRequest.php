<?php

namespace App\Http\Requests\Api\Caminhao;

use Illuminate\Foundation\Http\FormRequest;

class CaminhaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'placa_caminhao' => 'required|alpha_num|max:8|unique:caminhoes',
            'motorista_id' => 'required|integer|exists:motoristas,id',
            'modelo_id' => 'required|integer|exists:modelos,id',
        ];
    }

    public function messages()
    {
        return [
            'placa_caminhao.required' => 'A Placa é obrigatoria.',
            'placa_caminhao.alpha_num' => 'A Placa deve conter letras e numeros.',
            'placa_caminhao.unique' => 'Já existe um Caminhão com está placa, informe outra placa.',
            'motorista_id.required' => 'Id do motorista obrigatório.',
            'motorista_id.exists' => 'Id do motorista não encontrado .',
            'modelo_id.exists' => 'Id do modelo não encontrado .',
            'modelo_id.required' => 'Id do modelo é obrigatório .',
        ];
    }
}
