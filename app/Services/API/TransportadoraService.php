<?php

namespace App\Services\Api;

use App\Interfaces\Api\TransportadoraRepositoryInterface;
use App\Models\Transportadora;

class TransportadoraService
{
    public function __construct(
        protected TransportadoraRepositoryInterface $transportadoraRepositoryInterface
    )
    { }

    public function getAll()
    {
        return $this->transportadoraRepositoryInterface->getAll();
    }

    public function create(array $data)
    {
        return $this->transportadoraRepositoryInterface->create($data);
    }

    public function update(array $data, Transportadora $transportadora)
    {
        return $this->transportadoraRepositoryInterface->update($data, $transportadora);
    }

    public function delete($id)
    {
        return $this->transportadoraRepositoryInterface->delete($id);
    }

    public function findById($id)
    {
        return $this->transportadoraRepositoryInterface->findById($id);
    }

}
