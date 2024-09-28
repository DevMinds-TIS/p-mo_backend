<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    // Obtener todos los archivos
    public function index()
    {
        return File::all();
    }

    // Crear un nuevo archivo
    public function store(Request $request)
    {
        $request->validate([
            'sprint_id' => 'required|exists:sprints,id',
            'file_name' => 'required|string|max:255',
            'file_path' => 'required|string',
            'status' => 'nullable|string',
            'uploaded_at' => 'required|date',
        ]);

        return File::create($request->all());
    }

    // Mostrar un archivo específico
    public function show($id)
    {
        return File::findOrFail($id);
    }

    // Actualizar un archivo existente
    public function update(Request $request, $id)
    {
        $file = File::findOrFail($id);
        $file->update($request->all());

        return $file;
    }

    // Eliminar un archivo
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $file->delete();

        return response()->json(['message' => 'Archivo eliminado exitosamente']);
    }
}
