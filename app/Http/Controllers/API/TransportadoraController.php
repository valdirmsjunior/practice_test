<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Transportadora\StoreTransportadoraRequest;
use App\Http\Requests\Api\Transportadora\UpdateTransportadoraRequest;
use App\Http\Resources\Api\TransportadoraResource;
use App\Models\Transportadora;
use App\Services\Api\TransportadoraService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransportadoraController extends BaseController
{
    public function __construct(
        protected TransportadoraService $transportadoraService
    )
    { }

    public function index(): JsonResponse
    {
        $transportadora = $this->transportadoraService->getAll();

        //return $this->sendResponse($transportadora, 'Transportadoras listadas com sucesso.');
        return $this->sendResponse(TransportadoraResource::collection($transportadora),
                        'Transportadoras listadas com sucesso.');
    }

    public function show($id): JsonResponse
    {
        $transportadora = $this->transportadoraService->findById($id);

        if ($transportadora === false) {
            return $this->sendError('Transportadora não encontrada.');
        }

        return $this->sendResponse(new TransportadoraResource($transportadora), 'Transportadora encontrada com sucesso.');
    }

    public function store(StoreTransportadoraRequest $request): JsonResponse
    {
        $data = $request->all();
        $transportadora = $this->transportadoraService->create($data);

        return $this->sendResponse(new TransportadoraResource($transportadora), 'Transportadora adicionada com sucesso.');
    }

    public function update(UpdateTransportadoraRequest $request, Transportadora $transportadora): JsonResponse
    {
        $data = $request->all();
        $transportadora = $this->transportadoraService->update($data, $transportadora);

        return $this->sendResponse(new TransportadoraResource($transportadora), 'Transportadora atualizada com sucesso.');

    }

    public function destroy($id): JsonResponse
    {
        $transportadora = $this->transportadoraService->delete($id);

        if ($transportadora !== false) {
            return $this->sendResponse([], 'Transportadora deletada com sucesso.');
        }

        return $this->sendError('Transportadora não encontrada.');
    }
}

