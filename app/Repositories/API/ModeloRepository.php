<?php

namespace App\Repositories\API;

use App\Interfaces\API\ModeloRepositoryInterface;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModeloRepository implements ModeloRepositoryInterface
{
    public function getAll()
    {
        return Modelo::all();
    }

    public function create(array $data)
    {
        return Modelo::create($data);
    }

    public function update(array $data, $id)
    {
        try {
            $modelo = Modelo::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }

        $modelo->update($data);
        return $modelo;
    }

    public function delete($id)
    {
        try {
            $modelo = Modelo::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }

        $modelo->delete();
    }

    public function findById($id)
    {
        try {
            $modelo = Modelo::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }
        return $modelo;
    }
}
