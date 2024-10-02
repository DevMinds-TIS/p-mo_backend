<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    // Obtener todos los documentos
    public function index()
    {
        return Documento::all();
    }

    // Crear un nuevo documento
    public function store(Request $request)
    {
        $request->validate([
            'sprint_id' => 'required|exists:sprints,id',
            'nombredocumento' => 'required|string|max:255',
            'rutadocumento' => 'required|string',
            'estado' => 'nullable|string',
            'uploaded_at' => 'required|date',
        ]);

        return Documento::create($request->all());
    }

    // Mostrar un documento específico
    public function show($id)
    {
        return Documento::findOrFail($id);
    }

    // Actualizar un documento existente
    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);
        $documento->update($request->all());
        return $documento;
    }

    // Eliminar un documento
    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);
        $documento->delete();
        return response()->json(['message' => 'Documento eliminado exitosamente']);
    }
}
