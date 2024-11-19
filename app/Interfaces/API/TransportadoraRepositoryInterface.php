<?php

namespace App\Interfaces\API;

use App\Models\Transportadora;

interface TransportadoraRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function findById($id);
}
