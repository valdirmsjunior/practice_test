<?php

use App\Http\Controllers\Api\CaminhaoController;
use App\Http\Controllers\Api\ModeloController;
use App\Http\Controllers\Api\MotoristaController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TransportadoraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

// Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('transportadoras', TransportadoraController::class);
    Route::apiResource('motoristas', MotoristaController::class);
    Route::apiResource('modelos', ModeloController::class);
    Route::apiResource('caminhoes', CaminhaoController::class);
// });
