<?php

namespace App\Services\API;

use App\Interfaces\API\MotoristaRepositoryInterface;

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

    public function delete($id)
    {
        return $this->motoristaRepository->delete($id);
    }

    public function findById($id)
    {
        return $this->motoristaRepository->findById($id);
    }
}
