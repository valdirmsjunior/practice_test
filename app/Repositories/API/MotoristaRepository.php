<?php

namespace App\Repositories\Api;

use App\Interfaces\Api\MotoristaRepositoryInterface;
use App\Models\Motorista;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MotoristaRepository implements MotoristaRepositoryInterface
{
    public function getAll(Request $request)
    {
        $perPage = $request->get('per_page', 5);
        try {
            return Motorista::paginate($perPage);
        } catch (Exception $ex) {
            throw new Exception("Erro ao buscar motoristas: " .$ex->getMessage());
        }
    }

    public function create(array $data)
    {
        try {
            $motorista = Motorista::create($data);
        } catch (ModelNotFoundException $ex) {
            return false;
        }
        return $motorista;
    }

    public function update(array $data, $id)
    {
        try {
            $motorista = Motorista::findOrFail($id);
            $motorista->update($data);
            return $motorista;
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $motorista = Motorista::findOrFail($id);
            $motorista->delete();
            return response()->noContent();
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }

    public function findById($id)
    {
        try {
            $motorista = Motorista::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }
        return $motorista;
    }

}
