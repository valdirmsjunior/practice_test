<?php

namespace App\Services\API;

use App\Interfaces\API\TransportadoraRepositoryInterface;

class TransportadoraService
{
    public function __construct(
        protected TransportadoraRepositoryInterface $transportadoraRepository
    )
    { }

    public function getAll()
    {
        return $this->transportadoraRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->transportadoraRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->transportadoraRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->transportadoraRepository->delete($id);
    }

    public function findById($id)
    {
        return $this->transportadoraRepository->findById($id);
    }

}
