<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Validator;
class ProjectController extends Controller
{
    public function index()
    {
        $proyecto = Proyecto::all();
        if ($proyecto->isEmpty()) {
            $data = [
                'message' => 'No exisiste Proyectos',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        $data = [
            'actor' => $proyecto,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombreproyecto' => 'required|string|max:60',
            'codigo' => 'nullable|string|max:255',
            'invitacionproyecto' => 'nullable|file|mimes:pdf|max:5048', // Acepta archivos PDF de hasta 5MB
            'pliegoproyecto' => 'nullable|file|mimes:pdf|max:5048',    // Acepta archivos PDF de hasta 5MB
        ]);
        // Manejo de fallos en la validación
        if ($validator->fails()) {
            $data = [
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
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
            'invitacionproyecto' => $invitacionPath, // Guarda la ruta del archivo
            'pliegoproyecto' => $pliegoPath,         // Guarda la ruta del archivo
        ]);

        // Manejo de error en la creación del proyecto
        if (!$proyecto) {
            $data = [
                'message' => 'Error al crear proyecto',
                'status' => 501
            ];
            return response()->json($data, 501);
        }

        // Respuesta exitosa
        $data = [
            'proyecto' => $proyecto,
            'status' => 201
        ];
        return response()->json($data, 201);
    }
}
