<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SprintController extends Controller
{
    // Obtener todos los sprints (incluyendo documentos relacionados)
    public function index()
    {
        // Devuelve todos los sprints con los documentos asociados
        $sprints = Sprint::with('documentos')->get();
        return response()->json($sprints, 200);
    }

    // Crear un nuevo sprint
    public function store(Request $request)
    {
        $request->validate([
            'idsprint' => 'required|integer',
            'idequipo' => 'required|integer',
            'descripcion' => 'nullable|string',
            'fechainiciosprint' => 'nullable|date',
            'fechafinsprint' => 'nullable|date',
        ]);

        print// Crear un nuevo Sprint
        $s = new Sprint();
        $sprint->idsprint = $request->input('idsprint'); // Asegúrate de asignar el valor aquí
        $sprint->idequipo = $request->input('idequipo');
        $sprint->descripcion = $request->input('descripcion');
        $sprint->fechainiciosprint = $request->input('fechainiciosprint');
        $sprint->fechafinsprint = $request->input('fechafinsprint');

        return response()->json([
            'message' => 'Sprint creado exitosamente',
            'sprint' => $sprint
        ], 201);
        // Guardar en la base de datos
        $sprint->save();

        return response()->json($sprint, 201);
    }

    // Subida de archivos y asociación al sprint
    public function uploadDocument(Request $request, $sprintId)
    {
        $validatedData = $request->validate([
            'archivo' => 'required|file|mimes:pdf,doc,docx,jpg,png',
            'tipo_documento' => 'required|string', // Actas, Historia de Usuario, Test Plan, Reporte de Sprint, etc.
        ]);

        $sprint = Sprint::findOrFail($sprintId);

        // Guardar el archivo en el sistema de archivos (puede ser en S3, local, etc.)
        $filePath = $request->file('archivo')->store('documentos');

        // Crear un nuevo documento asociado al sprint
        $documento = new Documento();
        $documento->sprint_id = $sprint->idsprint;
        $documento->nombre = $request->file('archivo')->getClientOriginalName();
        $documento->tipo_documento = $validatedData['tipo_documento'];
        $documento->ruta = $filePath;
        $documento->estado = 'pendiente'; // Estado inicial del documento
        $documento->fecha_subida = now();
        $documento->save();

        return response()->json([
            'message' => 'Documento subido y asociado al sprint',
            'documento' => $documento
        ], 201);
    }

    // Obtener un sprint específico con sus documentos
    public function show($id)
    {
        $sprint = Sprint::with('documentos')->findOrFail($id);

        return response()->json($sprint, 200);
    }

    // Actualizar un sprint
    public function update(Request $request, $id)
    {
        $sprint = Sprint::findOrFail($id);

        $validatedData = $request->validate([
            'idequipo' => 'nullable|integer',
            'descripcion' => 'nullable|string',
            'fechainiciosprint' => 'required|date',
            'fechafinsprint' => 'required|date',
        ]);

        // Actualizar el sprint con los nuevos datos
        $sprint->update($validatedData);

        return response()->json([
            'message' => 'Sprint actualizado exitosamente',
            'sprint' => $sprint
        ], 200);
    }

    // Eliminar un sprint (y sus documentos asociados)
    public function destroy($id)
    {
        $sprint = Sprint::findOrFail($id);
        $sprint->delete();

        return response()->json(['message' => 'Sprint eliminado exitosamente'], 200);
    }
}
