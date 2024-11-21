<?php

namespace App\Services\Api;

use App\Interfaces\Api\CaminhaoRepositoryInterface;

class CaminhaoService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected CaminhaoRepositoryInterface $caminhaoRepository
    )
    { }

    public function getAll()
    {
        return $this->caminhaoRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->caminhaoRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->caminhaoRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->caminhaoRepository->delete($id);
    }

    public function findById($id)
    {
        return $this->caminhaoRepository->findById($id);
    }
}
