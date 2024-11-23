<?php

namespace App\Repositories\Api;

use App\Enums\StatusTransportadora;
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
            $data['status_transportadora'] = StatusTransportadora::ENABLE;
            return  Transportadora::create($data);
        } catch (Exception $ex) {
            return false;
        }
    }

    public function update(array $data, Transportadora $transportadora)
    {
        try {
            $transportadora->update($data);
            return $transportadora;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $transportadora = Transportadora::findOrFail($id);
            $transportadora->delete();
            return response()->noContent();
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

    public function enable($id)
    {
        try {
            $transportadora = Transportadora::findOrFail($id);
            $transportadora->status_transportadora = StatusTransportadora::ENABLE;
            $transportadora->save();
        } catch (Exception $th) {
            return false;
        }
    }

    public function disable($id)
    {
        try {
            $transportadora = Transportadora::findOrFail($id);
            $transportadora->status_transportadora = StatusTransportadora::DISABLE;
            $transportadora->save();
        } catch (Exception $ex) {
            return false;
        }
    }

    public function addMotorista(Transportadora $transportadora, $motoristaId)
    {
        try {
            return $transportadora->motoristas()->attach($motoristaId);
        } catch (Exception $ex) {
            return false;
        }
    }

    public function removeMotorista(Transportadora $transportadora, $motoristaId)
    {
        try {
            return $transportadora->motoristas()->detach($motoristaId);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
