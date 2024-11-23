<?php

namespace App\Repositories\Api;

use App\Interfaces\Api\ModeloRepositoryInterface;
use App\Models\Modelo;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModeloRepository implements ModeloRepositoryInterface
{
    public function getAll()
    {
        try {
            return Modelo::paginate(5);
        } catch (Exception $e) {
            return false;
        }

    }

    public function create(array $data)
    {
        try {
            return Modelo::create($data);
        } catch (Exception $e) {
            return false;
        }
    }

    public function update(array $data, $id)
    {
        try {
            $modelo = Modelo::findOrFail($id);
            $modelo->update($data);
            return $modelo;
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $modelo = Modelo::findOrFail($id);
            $modelo->delete();
            return $modelo;
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }

    public function findById($id)
    {
        try {
            $modelo = Modelo::findOrFail($id);
            return $modelo;
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }
}
