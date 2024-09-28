<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Obtener todas las tareas
    public function index()
    {
        return Task::all();
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'sprint_id' => 'required|exists:sprints,id',
            'nombre' => 'required|string|max:255',
            'status' => 'nullable|string',
            'progreso' => 'nullable|integer',
            'asignado_a' => 'nullable|integer|exists:users,id',
            'puntos' => 'nullable|integer',
            'rol' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        return Task::create($request->all());
    }

    // Mostrar una tarea específica
    public function show($id)
    {
        return Task::findOrFail($id);
    }

    // Actualizar una tarea existente
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return $task;
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Tarea eliminada exitosamente']);
    }
}
