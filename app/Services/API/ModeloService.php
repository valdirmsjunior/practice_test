<?php

namespace App\Services\API;

use App\Interfaces\API\ModeloRepositoryInterface;

class ModeloService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ModeloRepositoryInterface $modeloRepository
    )
    {  }

    public function getAll()
    {
        return $this->modeloRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->modeloRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->modeloRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->modeloRepository->delete($id);
    }

    public function findById($id)
    {
        return $this->modeloRepository->findById($id);
    }

}
