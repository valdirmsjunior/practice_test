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

    public function destroy($id)
    {
        return $this->transportadoraRepositoryInterface->destroy($id);
    }

    public function findById($id)
    {
        return $this->transportadoraRepositoryInterface->findById($id);
    }

    public function enable($id)
    {
        return $this->transportadoraRepositoryInterface->enable($id);
    }

    public function disable($id)
    {
        return $this->transportadoraRepositoryInterface->disable($id);
    }

    public function addMotorista(Transportadora $transportadora, $motoristaId)
    {
        return $this->transportadoraRepositoryInterface->addMotorista($transportadora, $motoristaId);
    }

    public function removeMotorista(Transportadora $transportadora, $motoristaId)
    {
        return $this->transportadoraRepositoryInterface->removeMotorista($transportadora, $motoristaId);
    }

}
