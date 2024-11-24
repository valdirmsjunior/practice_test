<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MotoristaResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome_motorista' => $this->nome_motorista,
            'cpf_motorista' => $this->cpf_motorista,
            'data_nascimento_motorista' => $this->data_nascimento_motorista->format('d/m/Y'),
            'email_motorista' => $this->email_motorista,
            'caminhoes' => $this->caminhoes,
        ];
    }

    public static function collection($resource)
    {
        return tap(parent::collection($resource), function ($collection) use ($resource) {
            $collection->additional(['meta' => [
                'total' => $resource->total(),
                'per_page' => $resource->perPage(),
                'current_page' => $resource->currentPage(),
                'last_page' => $resource->lastPage(),
            ]]);
        });
    }
}
