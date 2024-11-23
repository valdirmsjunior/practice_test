<?php

namespace App\Interfaces\Api;

use App\Models\Motorista;

interface MotoristaRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update(array $data, $id);
    public function destroy($id);
    public function findById($id);
}
