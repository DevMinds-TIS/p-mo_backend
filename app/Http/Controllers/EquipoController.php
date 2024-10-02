<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Validator;

class EquipoController extends Controller
{
    /**
     * Muestra una lista de todos los equipos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $equipos = Equipo::all();
        if ($equipos->isEmpty()) {
            return response()->json([
                'message' => 'No existen equipos',
                'status' => 200
            ], 200);
        }

        return response()->json([
            'equipos' => $equipos,
            'status' => 200
        ], 200);
    }

    // Crear un nuevo equipo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_equipo' => 'required|string|max:60',
            'nombre_equipo_largo' => 'nullable|string|max:100',
            'correo_equipo' => 'nullable|string|email|max:60',
            'logo_equipo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'La validación ha fallado',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        // Subir logo si existe
        $logoPath = $request->file('logo_equipo') 
                    ? $request->file('logo_equipo')->store('logos', 'public')
                    : null;

        // Crear equipo
        $equipo = Equipo::create([
            'nombre_equipo' => $request->nombre_equipo,
            'proyecto_id' => $request->proyecto_id,
            'nombre_equipo_largo' => $request->nombre_equipo_largo,
            'correo_equipo' => $request->correo_equipo,
            'logo_equipo' => $logoPath,
        ]);

        return response()->json([
            'equipo' => $equipo,
            'status' => 201
        ], 201);
    }

    // Mostrar un equipo por ID
    public function show($id)
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return response()->json([
                'message' => 'Equipo no encontrado',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'equipo' => $equipo,
            'status' => 200
        ], 200);
    }

    // Buscar equipos por nombre o correo
    public function search(Request $request)
    {
        $query = Equipo::query();

        if ($request->has('nombre_equipo')) {
            $query->where('nombre_equipo', 'like', '%' . $request->nombre_equipo . '%');
        }

        if ($request->has('correo_equipo')) {
            $query->where('correo_equipo', 'like', '%' . $request->correo_equipo . '%');
        }

        $equipos = $query->get();

        if ($equipos->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron equipos',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'equipos' => $equipos,
            'status' => 200
        ], 200);
    }

    // Actualizar equipo
    public function update(Request $request, $id)
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return response()->json([
                'message' => 'Equipo no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_equipo' => 'nullable|string|max:60',
            'nombre_equipo_largo' => 'nullable|string|max:100',
            'correo_equipo' => 'nullable|string|email|max:60',
            'logo_equipo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'La validación ha fallado',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        if ($request->hasFile('logo_equipo')) {
            $logoPath = $request->file('logo_equipo')->store('logos', 'public');
            $equipo->logo_equipo = $logoPath;
        }

        $equipo->nombre_equipo = $request->nombre_equipo ?? $equipo->nombre_equipo;
        $equipo->nombre_equipo_largo = $request->nombre_equipo_largo ?? $equipo->nombre_equipo_largo;
        $equipo->correo_equipo = $request->correo_equipo ?? $equipo->correo_equipo;
        $equipo->save();

        return response()->json([
            'message' => 'Equipo actualizado con éxito',
            'equipo' => $equipo,
            'status' => 200
        ], 200);
    }

    // Eliminar equipo
    public function delete($id)
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return response()->json([
                'message' => 'Equipo no encontrado',
                'status' => 404
            ], 404);
        }

        $equipo->delete();

        return response()->json([
            'message' => 'Equipo eliminado con éxito',
            'status' => 200
        ], 200);
    }
}