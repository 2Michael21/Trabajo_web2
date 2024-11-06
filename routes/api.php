<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculosController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('vehiculos', [VehiculosController::class, 'index']);           // Obtener todos los vehículos
Route::post('vehiculos', [VehiculosController::class, 'store']);           // Crear un nuevo vehículo
Route::get('vehiculos/{id}', [VehiculosController::class, 'show']);        // Obtener un vehículo específico
Route::put('vehiculos/{id}', [VehiculoController::class, 'update']);      // Actualizar un vehículo
Route::delete('vehiculos/{id}', [VehiculosController::class, 'destroy']);  // Eliminar un vehículo

