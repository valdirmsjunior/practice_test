<?php

use App\Http\Controllers\API\ModeloController;
use App\Http\Controllers\API\MotoristaController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\TransportadoraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('transportadoras', TransportadoraController::class);
    Route::resource('motoristas', MotoristaController::class);
    Route::resource('modelos', ModeloController::class);
});
