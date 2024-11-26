<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SiscodeRequest;
use App\Http\Resources\Api\SiscodeResource;
use App\Models\Document;
use App\Models\Siscode;
use Illuminate\Support\Facades\Log;
use Smalot\PdfParser\Parser;

class SiscodeController extends Controller
{
    public function index()
    {
        return SiscodeResource::collection(Siscode::all());
    }

    public function store(SiscodeRequest $request)
    {
        // Obtener el espacio relacionado 
        $spaceId = $request->input('idspace');
        $document = Document::where('idspace', $spaceId)->where('namedocument', 'Inscritos')->first();

        if (!$document) {
            return response()->json(['error' => 'Documento no encontrado'], 404);
        }

        // Ruta del archivo PDF 
        $filePath = storage_path('app/public/' . $document->pathdocument);

        // Procesar el PDF 
        $parser = new Parser();
        $pdf = $parser->parseFile($filePath);
        $text = $pdf->getText();

        Log::info('Texto completo a procesar: ' . $text); // Log del texto completo para debug

        // Procesar el texto para extraer la columna "Estudiante" 
        $estudiantes = $this->extractEstudiantes($text);

        // Guardar cada estudiante como un registro de siscode 
        foreach ($estudiantes as $estudiante) {
            Siscode::create([
                'idspace' => $spaceId,
                'siscode' => $estudiante
            ]);
        }

        return response()->json(['message' => 'Datos guardados correctamente']);
    }

    private function extractEstudiantes($text)
    {
        Log::info('Texto a procesar: ' . $text); // Log del texto completo

        $lines = explode("\n", $text);
        $estudiantes = [];

        foreach ($lines as $line) {
            Log::info('Procesando línea: ' . $line); // Log de cada línea

            // Saltar las líneas que no contienen datos relevantes
            if (preg_match('/^\d+\s*\d{9}/', $line)) {
                // Usar una expresión regular para capturar el número y el código de estudiante
                preg_match('/^\s*(\d+)\s*(\d{9})/', $line, $matches);
                if (!empty($matches)) {
                    $fila = $matches[1];
                    $codigoEstudiante = $matches[2];

                    Log::info('División correcta: Fila: ' . $fila . ' - Estudiante: ' . $codigoEstudiante); // Log de la división correcta
                    $estudiantes[] = $codigoEstudiante;
                }
            }
        }

        Log::info('Estudiantes extraídos: ' . json_encode($estudiantes)); // Log de todos los estudiantes capturados

        return $estudiantes;
    }

    public function show(Siscode $siscode)
    {
        return new SiscodeResource($siscode);
    }

    public function update(SiscodeRequest $request, Siscode $siscode)
    {
        $siscode->update($request->all());
        return new SiscodeResource($siscode);
    }

    public function destroy(Siscode $siscode)
    {
        $siscode->delete();
        return response()->json(['message' => 'Código SIS eliminado exitosamente']);
    }
}
