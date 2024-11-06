<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    // Mostrar todos los vehículos
    public function index()
    {
        return response()->json(Vehiculos::all(), 200);
    }

    // Guardar un nuevo vehículo
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
        ]);

        $vehiculos = Vehiculos::create($request->all());
        return response()->json([
            'message' => 'Vehículo creado con éxito.',
            'data' => $vehiculos
        ], 201);
    }

    // Mostrar un vehículo específico
    public function show($id)
    {
        $vehiculos = Vehiculos::find($id);

        if (!$vehiculos) {
            return response()->json(['message' => 'Vehículo no encontrado.'], 404);
        }

        return response()->json($vehiculos, 200);
    }

    // Actualizar un vehículo
    public function update(Request $request, $id)
    {
        $vehiculos = Vehiculos::find($id);

        if (!$vehiculos) {
            return response()->json(['message' => 'Vehículo no encontrado.'], 404);
        }

        $request->validate([
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
        ]);

        $vehiculos->update($request->all());
        return response()->json([
            'message' => 'Vehículo actualizado con éxito.',
            'data' => $vehiculos
        ], 200);
    }

    // Eliminar un vehículo
    public function destroy($id)
    {
        $vehiculos = Vehiculos::find($id);

        if (!$vehiculos) {
            return response()->json(['message' => 'Vehículo no encontrado.'], 404);
        }

        $vehiculos->delete();
        return response()->json(['message' => 'Vehículo eliminado con éxito.'], 200);
    }
}
