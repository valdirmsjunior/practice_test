<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Motorista\StoreMotoristaRequest;
use App\Http\Requests\Api\Motorista\UpdateMotoristaRequest;
use App\Http\Resources\Api\MotoristaResource;
use App\Services\Api\MotoristaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MotoristaController extends BaseController
{
    public function __construct(
        protected MotoristaService $motoristaService
    )
    { }

    public function index(): JsonResponse
    {
        $motoristas = $this->motoristaService->getAll();

        return $this->sendResponse(MotoristaResource::collection($motoristas),
                        'Motoristas listados com sucesso.');
    }

    public function show($id): JsonResponse
    {
        $motoristas = $this->motoristaService->findById($id);

        if ($motoristas === false) {
            return $this->sendError('Motorista não encontrado.');
        }

        return $this->sendResponse(new MotoristaResource($motoristas), 'Motorista encontrado com sucesso.');
    }

    public function store(StoreMotoristaRequest $request): JsonResponse
    {
        $data = $request->all();
        $motoristas = $this->motoristaService->create($data);

        if ($motoristas === false) {
            return $this->sendError('Erro ao cadastrar .');
        }

        return $this->sendResponse(new MotoristaResource($motoristas), 'Motorista adicionado com sucesso.');
    }

    public function update(UpdateMotoristaRequest $request, $id): JsonResponse
    {
        $data = $request->all();
        $motoristas = $this->motoristaService->update($data, $id);

        if ($motoristas === false) {
            return $this->sendError('Motorista não encontrado.');
        }
        return $this->sendResponse(new MotoristaResource($motoristas), 'Motorista atualizado com sucesso.');

    }

    public function destroy($id): JsonResponse
    {
        $motorista = $this->motoristaService->delete($id);

        if ($motorista !== false) {
            return $this->sendResponse([], 'Motorista deletado com sucesso.');
        }

        return $this->sendError('Motorista não foi deletado, tente novamente.');
    }
}
