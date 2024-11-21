<?php

namespace App\Interfaces\Api;


interface MotoristaRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function findById($id);
}
