<?php

namespace App\Http\Controllers;

use App\Models\MiembrosEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MiembrosEquipoController extends Controller
{
    // Obtener todos los miembros del equipo
    public function index()
    {
        $miembros = MiembrosEquipo::with(['proyecto', 'usuario'])->get();

        return response()->json([
            'miembros' => $miembros,
            'status' => 200,
        ]);
    }

    // Crear un nuevo miembro del equipo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idproyecto' => 'required|exists:proyectos,idproyecto',
            'user_id' => 'required|exists:users,id',
            'rol' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'La validación ha fallado',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        $miembro = MiembrosEquipo::create($request->all());

        return response()->json([
            'miembro' => $miembro,
            'status' => 201,
        ]);
    }

    // Mostrar un miembro específico del equipo
    public function show($id)
    {
        $miembro = MiembrosEquipo::with(['proyecto', 'usuario'])->find($id);

        if (!$miembro) {
            return response()->json([
                'message' => 'Miembro no encontrado',
                'status' => 404,
            ], 404);
        }

        return response()->json([
            'miembro' => $miembro,
            'status' => 200,
        ]);
    }

    // Actualizar un miembro del equipo existente
    public function update(Request $request, $id)
    {
        $miembro = MiembrosEquipo::find($id);

        if (!$miembro) {
            return response()->json([
                'message' => 'Miembro no encontrado',
                'status' => 404,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'idproyecto' => 'nullable|exists:proyectos,idproyecto',
            'user_id' => 'nullable|exists:users,id',
            'rol' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'La validación ha fallado',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        $miembro->update($request->all());

        return response()->json([
            'message' => 'Miembro actualizado',
            'miembro' => $miembro,
            'status' => 200,
        ]);
    }

    // Eliminar un miembro del equipo
    public function destroy($id)
    {
        $miembro = MiembrosEquipo::find($id);

        if (!$miembro) {
            return response()->json([
                'message' => 'Miembro no encontrado',
                'status' => 404,
            ], 404);
        }

        $miembro->delete();

        return response()->json([
            'message' => 'Miembro eliminado con éxito',
            'status' => 200,
        ]);
    }
}
