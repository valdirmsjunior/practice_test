<?php

namespace App\Http\Requests\Api\Motorista;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotoristaRequest extends FormRequest
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
            'cpf_motorista' => 'required|unique:motoristas|numeric',
            'data_nascimento_motorista' => 'required|date',
            'email_motorista' => 'nullable|email'
        ];
    }

    public function messages()
    {
        return [
            'nome_motorista.required' => 'O campo Nome é obrigatorio.',
            'cpf_motorista.required' => 'CPF é obrigatorio.',
            'cpf_motorista.numeric' => 'No CPF informar somente números.',
            'cpf_motorista.unique' => 'CPF já cadastrado, informe um cpf diferente.',
            'data_nascimento_motorista' => 'Campo Data de nascimento obrigatorio.',
            'email_motorista.email' => 'Informe um email válido.',
        ];
    }
}
