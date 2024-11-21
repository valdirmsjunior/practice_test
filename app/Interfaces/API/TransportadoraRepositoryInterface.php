<?php

namespace App\Interfaces\Api;

use App\Models\Transportadora;

interface TransportadoraRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update(array $data, Transportadora $transportadora);
    public function delete(Transportadora $transportadora);
    public function findById($id);
}
