<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    // Método para obtener todos los sprints
    public function index()
    {
        $sprints = Sprint::with('tasks', 'files')->get(); // Asegúrate de cargar relaciones
        return response()->json([
            'status' => 200,
            'data' => $sprints
        ]);
    }

    // Método para crear un nuevo sprint
    public function store(Request $request)
    {
        // Validar la entrada
        $validatedData = $request->validate([
            'project_id' => 'required|exists:Proyecto,id', // Verifica que el proyecto exista
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio', // Asegúrate de que la fecha de fin sea posterior a la de inicio
        ]);

        // Crear el nuevo sprint
        $sprint = Sprint::create($validatedData);

        return response()->json([
            'status' => 201,
            'data' => $sprint
        ]);
    }

    // Mostrar un sprint específico
    public function show($id)
    {
        $sprint = Sprint::with('tasks', 'files')->findOrFail($id);
        return response()->json([
            'status' => 200,
            'data' => $sprint
        ]);
    }

    // Actualizar un sprint existente
    public function update(Request $request, $id)
    {
        $sprint = Sprint::findOrFail($id);
        
        // Validar la entrada
        $validatedData = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after:fecha_inicio',
        ]);

        $sprint->update($validatedData);

        return response()->json([
            'status' => 200,
            'data' => $sprint
        ]);
    }

    // Eliminar un sprint
    public function destroy($id)
    {
        $sprint = Sprint::findOrFail($id);
        $sprint->delete();

        return response()->json(['message' => 'Sprint eliminado exitosamente', 'status' => 204]);
    }
}
