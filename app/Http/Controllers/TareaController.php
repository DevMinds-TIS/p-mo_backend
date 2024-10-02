<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    // Obtener todas las tareas
    public function index()
    {
        return Tarea::all();
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'sprint_id' => 'required|exists:sprints,id',
            'nombretarea' => 'required|string|max:255',
            'estado' => 'nullable|string',
            'progreso' => 'nullable|integer',
            'asignado_a' => 'nullable|integer|exists:users,id',
            'puntos' => 'nullable|integer',
            'rol' => 'nullable|string',
            'fechainiciotarea' => 'required|date',
            'fechafintarea' => 'required|date',
            'descripciontarea' => 'nullable|string',
            'mockuptarea' => 'nullable|string',
        ]);

        return Tarea::create($request->all());
    }

    // Mostrar una tarea específica
    public function show($id)
    {
        return Tarea::findOrFail($id);
    }

    // Actualizar una tarea existente
    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->all());
        return $tarea;
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
        return response()->json(['message' => 'Tarea eliminada exitosamente']);
    }
}


