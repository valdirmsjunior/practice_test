<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaminhaoResource extends JsonResource
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
            'placa_caminhao' => $this->placa_caminhao,
            'motorista_id' => $this->motorista_id,
            'modelo_id' => $this->modelo_id,
        ];
    }
}
