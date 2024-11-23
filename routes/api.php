<?php

use App\Http\Controllers\Api\CaminhaoController;
use App\Http\Controllers\Api\ModeloController;
use App\Http\Controllers\Api\MotoristaController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TransportadoraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

// Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('transportadoras', TransportadoraController::class);
    Route::apiResource('motoristas', MotoristaController::class);
    Route::apiResource('modelos', ModeloController::class);
    Route::apiResource('caminhoes', CaminhaoController::class);

    Route::put('transportadoras/{transportadora}/enable', [TransportadoraController::class, 'enable']);
    Route::put('transportadoras/{transportadora}/disable', [TransportadoraController::class, 'disable']);
    Route::post('transportadoras/{transportadora}/motoristas/{motorista}', [TransportadoraController::class, 'addMotorista']);
    Route::delete('transportadoras/{transportadora}/motoristas/{motorista}', [TransportadoraController::class, 'removeMotorista']);

    Route::post('motoristas/{motorista}/transportadoras/{transportadora}', [MotoristaController::class, 'addTransportadora']);
    Route::delete('motoristas/{motorista}/transportadoras/{transportadora}', [MotoristaController::class, 'removeTransportadora']);
// });
