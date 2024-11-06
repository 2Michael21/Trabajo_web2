<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    // Mostrar todos los vehículos
    public function index()
    {
        return response()->json(Vehiculo::all(), 200);
    }

    // Guardar un nuevo vehículo
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
        ]);

        $vehiculo = Vehiculo::create($request->all());
        return response()->json([
            'message' => 'Vehículo creado con éxito.',
            'data' => $vehiculo
        ], 201);
    }

    // Mostrar un vehículo específico
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado.'], 404);
        }

        return response()->json($vehiculo, 200);
    }

    // Actualizar un vehículo
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado.'], 404);
        }

        $request->validate([
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
        ]);

        $vehiculo->update($request->all());
        return response()->json([
            'message' => 'Vehículo actualizado con éxito.',
            'data' => $vehiculo
        ], 200);
    }

    // Eliminar un vehículo
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado.'], 404);
        }

        $vehiculo->delete();
        return response()->json(['message' => 'Vehículo eliminado con éxito.'], 200);
    }
}
