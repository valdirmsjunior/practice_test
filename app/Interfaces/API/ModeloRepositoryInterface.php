<?php

namespace App\Interfaces\Api;

use Illuminate\Http\Request;

interface ModeloRepositoryInterface
{
    public function getAll(Request $request);
    public function create(array $data);
    public function update(array $data, $id);
    public function destroy($id);
    public function findById($id);
}
