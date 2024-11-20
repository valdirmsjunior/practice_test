<?php

namespace App\Http\Requests\API\Modelo;

use Illuminate\Foundation\Http\FormRequest;

class ModeloRequest extends FormRequest
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
            'modelo_caminhao' => 'required|max:50|string',
            'cor_caminhao' => 'required|max:50|string',
        ];
    }

    public function messages()
    {
        return [
            'modelo_caminhao.required' => 'O campo modelo_caminhao é obrigatorio.',
            'cor_caminhao.required' => 'Cor é obrigatória.',
        ];
    }
}
