<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    
    public function index()
    {
        // Traer proyectos con sus relaciones
        $proyectos = Proyecto::with('sprints', 'teamMembers')->get();

        if ($proyectos->isEmpty()) {
            return response()->json([
                'message' => 'No existen proyectos',
                'status' => 200
            ], 200);
        }

        return response()->json([
            'proyectos' => $proyectos,
            'status' => 200
        ], 200);
    }

    // Método para almacenar un nuevo proyecto
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombreproyecto' => 'required|string|max:60',
            'codigo' => 'nullable|string|max:255',
            'invitacionproyecto' => 'nullable|file|mimes:pdf|max:5048',
            'pliegoproyecto' => 'nullable|file|mimes:pdf|max:5048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        // Manejo de la subida de archivos
        $invitacionPath = $request->file('invitacionproyecto')
            ? $request->file('invitacionproyecto')->store('invitaciones', 'public')
            : null;

        $pliegoPath = $request->file('pliegoproyecto')
            ? $request->file('pliegoproyecto')->store('pliegos', 'public')
            : null;

        // Creación del proyecto
        $proyecto = Proyecto::create([
            'nombreproyecto' => $request->nombreproyecto,
            'codigo' => $request->codigo,
            'invitacionproyecto' => $invitacionPath,
            'pliegoproyecto' => $pliegoPath,
        ]);

        if (!$proyecto) {
            return response()->json([
                'message' => 'Error al crear proyecto',
                'status' => 501
            ], 501);
        }

        return response()->json([
            'proyecto' => $proyecto,
            'status' => 201
        ], 201);
    }

    // Método para obtener equipos por proyecto basado en fechas de inicio y fin
    public function getEquiposByProyecto($id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json([
                'message' => 'Proyecto no encontrado',
                'status' => 404
            ], 404);
        }

        // Obtén los equipos asociados a este proyecto en base a las fechas de inicio y fin
        $equipos = $proyecto->equipos()->whereBetween('fecha', [$proyecto->inicio, $proyecto->fin])->get();

        return response()->json([
            'proyecto' => $proyecto,
            'equipos' => $equipos,
            'status' => 200
        ], 200);
    }

    // Mostrar un proyecto específico
    public function show($id)
    {
        $proyecto = Proyecto::with('sprints', 'teamMembers')->findOrFail($id);
        return response()->json($proyecto, 200);
    }

    // Actualizar un proyecto existente
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->update($request->all());

        return response()->json($proyecto, 200);
    }

    // Eliminar un proyecto
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return response()->json(['message' => 'Proyecto eliminado exitosamente'], 200);
    }
}

