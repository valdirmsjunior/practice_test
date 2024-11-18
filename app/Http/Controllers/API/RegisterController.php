<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('Rodobank')->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'Usuário registrado com sucesso.');
    }

    public function login(Request $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('Rodobank')->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'Usuario logado com sucesso.');
        }
        else
        {
            return $this->sendError('Usuário não Autorizado.', ['error' => 'Não Autorizado']);
        }
    }
}