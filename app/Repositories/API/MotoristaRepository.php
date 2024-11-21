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
        return Motorista::all();
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
        } catch (ModelNotFoundException $ex) {
            return false;
        }

        return $motorista->update($data);
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
