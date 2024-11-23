<?php

namespace App\Http\Requests\Api\Motorista;

use App\Rules\Cpf;
use Illuminate\Foundation\Http\FormRequest;

class StoreMotoristaRequest extends BaseMotoristaRequest
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
            'nome_motorista' => 'required|max:100|string',
            'cpf_motorista' => ['required',new Cpf(),'unique:motoristas'],
            'data_nascimento_motorista' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'email_motorista' => 'nullable|email'
        ];
    }
}
