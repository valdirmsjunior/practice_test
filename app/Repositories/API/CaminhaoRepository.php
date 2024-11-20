<?php

namespace App\Repositories\API;

use App\Interfaces\API\CaminhaoRepositoryInterface;
use App\Models\Caminhao;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CaminhaoRepository implements CaminhaoRepositoryInterface
{
    public function getAll()
    {
        return Caminhao::all();
    }

    public function create(array $data)
    {
        return Caminhao::create($data);
    }

    public function update(array $data, $id)
    {
        try {
            $caminhao = Caminhao::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }

        $caminhao->update($data);
        return $caminhao;
    }

    public function delete($id)
    {
        try {
            $caminhao = Caminhao::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }

        $caminhao->delete();
    }

    public function findById($id)
    {
        try {
            $caminhao = Caminhao::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }
        return $caminhao;
    }
}
