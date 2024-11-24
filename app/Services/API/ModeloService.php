<?php

namespace App\Services\Api;

use App\Interfaces\Api\ModeloRepositoryInterface;
use Illuminate\Http\Request;

class ModeloService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ModeloRepositoryInterface $modeloRepository
    )
    {  }

    public function getAll(Request $request)
    {
        return $this->modeloRepository->getAll($request);
    }

    public function create(array $data)
    {
        return $this->modeloRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->modeloRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->modeloRepository->destroy($id);
    }

    public function findById($id)
    {
        return $this->modeloRepository->findById($id);
    }

}
