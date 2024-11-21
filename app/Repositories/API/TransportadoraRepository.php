<?php

namespace App\Repositories\Api;

use App\Interfaces\Api\TransportadoraRepositoryInterface;
use App\Models\Transportadora;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransportadoraRepository implements TransportadoraRepositoryInterface
{
    public function getAll()
    {
        try {
            return Transportadora::paginate(5);
        } catch (Exception $ex) {
            return false;
        }
    }

    public function create(array $data)
    {
        try {
            $transportadora = new Transportadora($data);
            $transportadora->save();
            return $transportadora;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function update(array $data, Transportadora $transportadora)
    {
        try {
            $transportadora->update($data);
            return $transportadora;
        } catch (Exception $ex) {
            dd($ex->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $transportadora = Transportadora::findOrFail($id);
            return $transportadora->delete();
        } catch (Exception $ex) {
            return false;
        }
    }

    public function findById($id)
    {
        try {
            return Transportadora::findOrFail($id);
        } catch (Exception $ex) {
            return false;
        }
    }
}
