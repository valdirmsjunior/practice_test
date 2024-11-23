<?php

namespace App\Repositories\Api;

use App\Interfaces\Api\MotoristaRepositoryInterface;
use App\Models\Motorista;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MotoristaRepository implements MotoristaRepositoryInterface
{
    public function getAll()
    {
        try {
            return Motorista::paginate(5);
            //return $motoristas;
        } catch (Exception $ex) {
            throw new Exception("Erro ao buscar motoristas: " .$ex->getMessage());
            //return false;
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

    public function update(array $data, Motorista $motorista)
    {
        try {
            $motorista->update($data);
            return $motorista;
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $motorista = Motorista::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }

        $motorista->delete();
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
