<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('vehiculos', [VehiculoController::class, 'index']);           // Obtener todos los vehículos
Route::post('vehiculos', [VehiculoController::class, 'store']);           // Crear un nuevo vehículo
Route::get('vehiculos/{id}', [VehiculoController::class, 'show']);        // Obtener un vehículo específico
Route::put('vehiculos/{id}', [VehiculoController::class, 'update']);      // Actualizar un vehículo
Route::delete('vehiculos/{id}', [VehiculoController::class, 'destroy']);  // Eliminar un vehículo

