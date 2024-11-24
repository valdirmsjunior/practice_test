<?php

namespace App\Repositories\Api;

use App\Interfaces\Api\CaminhaoRepositoryInterface;
use App\Models\Caminhao;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CaminhaoRepository implements CaminhaoRepositoryInterface
{
    public function getAll(Request $request)
    {
        $perPage = $request->get('per_page', 5);
        try {
            return Caminhao::paginate($perPage);
        } catch (Exception $ex) {
            return false;
        }
    }

    public function create(array $data)
    {
        try {
            return Caminhao::create($data);
        } catch (Exception $ex) {
            return false;
        }
    }

    public function update(array $data, $id)
    {
        try {
            $caminhao = Caminhao::findOrFail($id);
            $caminhao->update($data);
            return $caminhao;
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $caminhao = Caminhao::findOrFail($id);
            $caminhao->delete();
            return response()->noContent();
        } catch (ModelNotFoundException $ex) {
            return false;
        }


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
