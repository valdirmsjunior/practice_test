<?php

namespace App\Http\Resources\Api;

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
