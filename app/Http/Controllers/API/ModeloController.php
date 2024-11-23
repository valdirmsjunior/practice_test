<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Modelo\ModeloRequest;
use App\Http\Resources\Api\ModeloResource;
use App\Services\Api\ModeloService;
use Illuminate\Http\JsonResponse;

class ModeloController extends BaseController
{
    public function __construct(
        protected ModeloService $modeloService
    )
    { }

    public function index(): JsonResponse
    {
        $modelos = $this->modeloService->getAll();

        return $this->sendResponse(ModeloResource::collection($modelos),
                        'Modelos listados com sucesso.');
    }

    public function show($id): JsonResponse
    {
        $modelo = $this->modeloService->findById($id);

        if ($modelo === false) {
            return $this->sendError('modelo não encontrado.');
        }

        return $this->sendResponse(new ModeloResource($modelo), 'Modelo encontrado com sucesso.');
    }

    public function store(ModeloRequest $request): JsonResponse
    {
        $modelo = $this->modeloService->create($request->validated());

        if ($modelo === false) {
            return $this->sendError('Erro ao cadastrar o Modelo, tente novamente.');
        }

        return $this->sendResponse(new ModeloResource($modelo), 'Modelo adicionado com sucesso.');
    }

    public function update(ModeloRequest $request, $id): JsonResponse
    {
        $modelo = $this->modeloService->update($request->validated(), $id);

        if ($modelo === false) {
            return $this->sendError('modelo não atualizado, tente novamente.');
        }
        return $this->sendResponse(new ModeloResource($modelo), 'modelo atualizado com sucesso.');

    }

    public function destroy($id): JsonResponse
    {
        $modelo = $this->modeloService->destroy($id);

        if ($modelo !== false) {
            return $this->sendResponse([], 'modelo deletado com sucesso.');
        }

        return $this->sendError('modelo não deletado, tente novamente.');
    }
}
