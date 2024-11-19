<?php

namespace App\Repositories\API;

use App\Interfaces\API\TransportadoraRepositoryInterface;
use App\Models\Transportadora;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransportadoraRepository implements TransportadoraRepositoryInterface
{
    public function getAll()
    {
        return Transportadora::all();
    }

    public function create(array $data)
    {
        $data['status_transportadora'] = 1;
        return Transportadora::create($data);
    }

    public function update(array $data, $id)
    {
        try {
            $transportadora = Transportadora::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }

        $transportadora->update($data);
        return $transportadora;
    }

    public function delete($id)
    {
        try {
            $transportadora = Transportadora::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }

        $transportadora->delete();
    }

    public function findById($id)
    {
        try {
            $transportadora = Transportadora::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }
        return $transportadora;
    }
}
