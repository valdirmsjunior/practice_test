<?php

namespace App\Http\Requests\Api\Transportadora;

use App\Rules\Cnpj;
use Illuminate\Validation\Rule;

class UpdateTransportadoraRequest extends BaseTransportadoraRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome_transportadora' => 'required|max:100|string',
            'cnpj_transportadora' => ['required',new Cnpj(),Rule::unique('transportadoras')->ignore($this->transportadora)],
        ];
    }
}
