<?php

namespace App\Services\Api;

use App\Interfaces\Api\CaminhaoRepositoryInterface;
use Illuminate\Http\Request;

class CaminhaoService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected CaminhaoRepositoryInterface $caminhaoRepositoryInterface
    )
    { }

    public function getAll(Request $request)
    {
        return $this->caminhaoRepositoryInterface->getAll($request);
    }

    public function create(array $data)
    {
        return $this->caminhaoRepositoryInterface->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->caminhaoRepositoryInterface->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->caminhaoRepositoryInterface->destroy($id);
    }

    public function findById($id)
    {
        return $this->caminhaoRepositoryInterface->findById($id);
    }
}
