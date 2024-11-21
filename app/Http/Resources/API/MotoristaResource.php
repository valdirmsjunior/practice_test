<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MotoristaResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'nome_motorista' => $this->nome_motorista,
            'cpf_motorista' => $this->cpf_motorista,
            'data_nascimento_motorista' => $this->data_nascimento_motorista->format('d/m/Y'),
            'email_motorista' => $this->email_motorista,
        ];
    }
}
