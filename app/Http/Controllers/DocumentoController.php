<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Sprint;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'sprint_id' => 'required|exists:sprints,id',
            'documento' => 'required|file|mimes:pdf,docx,txt', // Solo acepta ciertos tipos de archivos
            'tipo' => 'required|string|in:acta,historia_de_usuario,test_plan,reporte_sprint',
        ]);

        // Guardar archivo
        $path = $request->file('documento')->store('documentos');

        // Crear registro en la base de datos
        $documento = Documento::create([
            'sprint_id' => $request->sprint_id,
            'nombre' => $request->file('documento')->getClientOriginalName(),
            'tipo' => $request->tipo,
            'ruta' => $path,
            'fecha_subida' => now(),
        ]);

        return response()->json($documento, 201);
    }
}


