<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Transportadora\StoreTransportadoraRequest;
use App\Http\Requests\Api\Transportadora\UpdateTransportadoraRequest;
use App\Http\Resources\Api\TransportadoraResource;
use App\Models\Transportadora;
use App\Services\Api\TransportadoraService;
use Illuminate\Http\JsonResponse;

class TransportadoraController extends BaseController
{
    public function __construct(
        protected TransportadoraService $transportadoraService
    )
    { }

    public function index(): JsonResponse
    {
        $transportadora = $this->transportadoraService->getAll();

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
        $transportadora = $this->transportadoraService->create($request->validated());

        if ($transportadora === false) {
            return $this->sendError('Erro ao cadastrar .');
        }

        return $this->sendResponse(new TransportadoraResource($transportadora), 'Transportadora adicionada com sucesso.');
    }

    public function update(UpdateTransportadoraRequest $request, Transportadora $transportadora): JsonResponse
    {
        $transportadora = $this->transportadoraService->update($request->validated(), $transportadora);

        return $this->sendResponse(new TransportadoraResource($transportadora), 'Transportadora atualizada com sucesso.');

    }

    public function destroy($id): JsonResponse
    {
        $transportadora = $this->transportadoraService->destroy($id);

        if ($transportadora !== false) {
            return $this->sendResponse([], 'Transportadora deletada com sucesso.');
        }

        return $this->sendError('Transportadora não encontrada.');
    }

    public function enable($id)
    {
        $status = $this->transportadoraService->enable($id);

        if ($status !== false) {
            return $this->sendResponse([], 'Status alterado com sucesso.');
        }

        return $this->sendError('Status nao pode ser atualizado, tente novamente.');
    }

    public function disable($id)
    {
        $status = $this->transportadoraService->disable($id);

        if ($status !== false) {
            return $this->sendResponse([], 'Status atualizado com sucesso.');
        }

        return $this->sendError('Status nao pode ser atualizado, tente novamente.');
    }

    public function addMotorista(Transportadora $transportadora, $motoristaId)
    {
        $addMotorista = $this->transportadoraService->addMotorista($transportadora, $motoristaId);

        if ($addMotorista !== false) {
            return $this->sendResponse([], 'Motorista adicionado a transportadora com sucesso.');
        }

        return $this->sendError('Motorista nao foi adicionado a transportadora, tente novamente.');
    }

    public function removeMotorista(Transportadora $transportadora, $motoristaId)
    {
        $removeMotorista = $this->transportadoraService->removeMotorista($transportadora, $motoristaId);

        if ($removeMotorista !== false) {
            return $this->sendResponse([], 'Motorista removido da transportadora com sucesso.');
        }

        return $this->sendError('Motorista nao foi removido da transportadora, tente novamente.');
    }
}

