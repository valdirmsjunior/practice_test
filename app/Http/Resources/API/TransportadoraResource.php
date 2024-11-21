<?php

namespace App\Http\Resources\Api;

use App\Models\Transportadora;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransportadoraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome_transportadora' => $this->nome_transportadora,
            'cnpj_transportadora' => $this->cnpj_transportadora,
            'status_transportadora' => $this->status_transportadora,
            'motoristas' => $this->motoristas,
        ];
    }
}
