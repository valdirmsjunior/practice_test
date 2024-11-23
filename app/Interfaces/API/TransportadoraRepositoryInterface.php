<?php

namespace App\Interfaces\Api;

use App\Models\Transportadora;

interface TransportadoraRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update(array $data, Transportadora $transportadora);
    public function destroy($id);
    public function findById($id);
    public function enable($id);
    public function disable($id);
    public function addMotorista(Transportadora $transportadora, $motoristaId);
    public function removeMotorista(Transportadora $transportadora, $motoristaId);

}
