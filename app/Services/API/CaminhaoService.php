<?php

namespace App\Services\Api;

use App\Interfaces\Api\CaminhaoRepositoryInterface;
use App\Models\Caminhao;

class CaminhaoService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected CaminhaoRepositoryInterface $caminhaoRepositoryInterface
    )
    { }

    public function getAll()
    {
        return $this->caminhaoRepositoryInterface->getAll();
    }

    public function create(array $data)
    {
        return $this->caminhaoRepositoryInterface->create($data);
    }

    public function update(array $data, Caminhao $caminhao)
    {
        return $this->caminhaoRepositoryInterface->update($data, $caminhao);
    }

    public function destroy($id)
    {
        return $this->caminhaoRepositoryInterface->destroy($id);
    }

    public function findById($id)
    {
        return $this->caminhaoRepositoryInterface->findById($id);
    }
}
