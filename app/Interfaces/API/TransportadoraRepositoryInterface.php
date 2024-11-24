<?php

namespace App\Interfaces\Api;

use App\Models\Transportadora;
use Illuminate\Http\Request;

interface TransportadoraRepositoryInterface
{
    public function getAll(Request $request);
    public function create(array $data);
    public function update(array $data, $id);
    public function destroy($id);
    public function findById($id);
    public function enable($id);
    public function disable($id);
    public function addMotorista(Transportadora $transportadora, $motoristaId);
    public function removeMotorista(Transportadora $transportadora, $motoristaId);

}
