<?php

namespace App\Repositories\Api;

use App\Interfaces\Api\ModeloRepositoryInterface;
use App\Models\Modelo;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ModeloRepository implements ModeloRepositoryInterface
{
    public function getAll(Request $request)
    {
        $perPage = $request->get('per_page', 5);
        try {
            return Modelo::paginate($perPage);
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
