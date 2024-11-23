<?php

namespace App\Interfaces\Api;

use App\Models\Caminhao;

interface CaminhaoRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update(array $data, Caminhao $caminhao);
    public function destroy($id);
    public function findById($id);
}
