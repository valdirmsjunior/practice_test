<?php

namespace App\Services\Api;

use App\Interfaces\Api\MotoristaRepositoryInterface;
use App\Models\Motorista;

class MotoristaService
{
    public function __construct(
        protected MotoristaRepositoryInterface $motoristaRepository
    )
    { }

    public function getAll()
    {
        return $this->motoristaRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->motoristaRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->motoristaRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->motoristaRepository->destroy($id);
    }

    public function findById($id)
    {
        return $this->motoristaRepository->findById($id);
    }
}
