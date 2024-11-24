<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Caminhao\StoreCaminhaoRequest;
use App\Http\Requests\Api\Caminhao\UpdateCaminhaoRequest;
use App\Http\Resources\Api\CaminhaoResource;
use App\Models\Caminhao;
use App\Services\Api\CaminhaoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CaminhaoController extends BaseController
{
    public function __construct(
        protected CaminhaoService $caminhaoService
    )
    { }

    public function index(Request $request): JsonResponse
    {
        $caminhoes = $this->caminhaoService->getAll($request);

        return $this->sendResponse(CaminhaoResource::collection($caminhoes),
                        'caminhoes listados com sucesso.');
    }

    public function show($id): JsonResponse
    {
        $caminhao = $this->caminhaoService->findById($id);

        if ($caminhao === false) {
            return $this->sendError('caminhao não encontrado.');
        }

        return $this->sendResponse(new CaminhaoResource($caminhao), 'caminhao encontrado com sucesso.');
    }

    public function store(StoreCaminhaoRequest $request): JsonResponse
    {
        $data = $request->all();
        $caminhao = $this->caminhaoService->create($data);

        return $this->sendResponse(new CaminhaoResource($caminhao), 'caminhao adicionado com sucesso.');
    }

    public function update(UpdateCaminhaoRequest $request, $id): JsonResponse
    {
        $caminhao = $this->caminhaoService->update($request->validated(), $id);

        if ($caminhao !== false) {
            return $this->sendResponse(new CaminhaoResource($caminhao), 'caminhao atualizado com sucesso.');
        }

        return $this->sendError('Caminhao não pode ser atualizado, tente novamente.');
    }

    public function destroy($id): JsonResponse
    {
        $caminhao = $this->caminhaoService->destroy($id);

        if ($caminhao !== false) {
            return $this->sendResponse([], 'caminhao deletado com sucesso.');
        }

        return $this->sendError('caminhao não encontrado.');
    }
}
