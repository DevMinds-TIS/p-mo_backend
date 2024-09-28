<?php

namespace App\Http\Controllers;
use Smalot\PdfParser\Parser;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;

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
            'proyecto' => $proyecto,
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
            'pliegoproyecto' => 'nullable|file|mimes:pdf|max:5048',
            'listaInscrito' => 'nullable|file|mimes:pdf|max:5048',
            'fechainicioproyecto' => 'nullable|date',
            'fechafinproyecto' => 'nullable|date',
            'fechainicioinscripcion' => 'nullable|date',
            'fechafininscripcion' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        // Crear directorios si no existen
        Storage::disk('public')->makeDirectory('invitaciones');
        Storage::disk('public')->makeDirectory('pliegos');
        Storage::disk('public')->makeDirectory('lista');

        // Verificar si los archivos están presentes antes de intentar guardarlos
        $invitacionPath = $request->hasFile('invitacionproyecto')
            ? $request->file('invitacionproyecto')->store('invitaciones', 'public')
            : null;

        $pliegoPath = $request->hasFile('pliegoproyecto')
            ? $request->file('pliegoproyecto')->store('pliegos', 'public')
            : null;

        $listaPath = $request->hasFile('listaInscrito')
            ? $request->file('listaInscrito')->store('lista', 'public')
            : null;

        $proyecto = Proyecto::create([
            'nombreproyecto' => $request->nombreproyecto,
            'codigo' => $request->codigo,
            'invitacionproyecto' => $invitacionPath,
            'pliegoproyecto' => $pliegoPath,
            'listaInscrito' => $listaPath,
            'fechainicioproyecto' => $request->fechainicioproyecto,
            'fechafinproyecto' => $request->fechafinproyecto,
            'fechainicioinscripcion' => $request->fechainicioinscripcion,
            'fechafininscripcion' => $request->fechafininscripcion,
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

    public function show($id)
    {
        // Obtener el proyecto por ID
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json([
                'message' => 'Proyecto no encontrado',
                'status' => 404
            ], 404);
        }

        // Inicializar las variables
        $codigosSis = [];
        $text = null; // Variable para el texto del PDF

        // Verificar si el archivo PDF de lista de inscritos está disponible
        if ($proyecto->listaInscrito) {
            $pdfPath = storage_path('app/public/' . $proyecto->listaInscrito);

            // Asegurarse de que el archivo PDF existe en el almacenamiento
            if (file_exists($pdfPath)) {
                try {
                    // Crear el objeto parser y leer el PDF
                    $pdfParser = new \Smalot\PdfParser\Parser();
                    $pdf = $pdfParser->parseFile($pdfPath);

                    // Obtener el texto completo del PDF
                    $text = $pdf->getText();

                    // Imprimir el texto para ver si se está leyendo correctamente
                    if (!$text) {
                        return response()->json([
                            'message' => 'No se pudo extraer texto del PDF.',
                            'status' => 500
                        ], 500);
                    }

                    // Extraer solo los códigos SIS (asumiendo que son de 8 dígitos)
                    preg_match_all('/\b\d{8}\b/', $text, $matches);
                    $codigosSis = array_unique($matches[0]); // Eliminar duplicados si es necesario
                } catch (\Exception $e) {
                    return response()->json([
                        'message' => 'Error al procesar el PDF: ' . $e->getMessage(),
                        'status' => 500
                    ], 500);
                }
            } else {
                return response()->json([
                    'message' => 'Archivo PDF no encontrado',
                    'status' => 404
                ], 404);
            }
        }

        // Retornar el proyecto, texto del PDF y los códigos SIS extraídos
        return response()->json([
            'pdf_texto_completo' => $text,     // Mostrar el texto del PDF para depuración
            'codigos_sis' => $codigosSis,
            'status' => 200
        ], 200);
    }

    public function show2($id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            $data = [
                'message' => 'proyecto no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'proyecto' => $proyecto,
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    public function updatePartial(Request $request, $id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado', 'status' => 404], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombreproyecto' => 'max:60',
            'codigo' => 'max:255',
            'invitacionproyecto' => 'file|mimes:pdf|max:5048',
            'pliegoproyecto' => 'file|mimes:pdf|max:5048',
            'listaInscrito' => 'file|mimes:pdf|max:5048',
            'fechainicioproyecto' => 'date',
            'fechafinproyecto' => 'date',
            'fechainicioinscripcion' => 'date',
            'fechafininscripcion' => 'date',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors(), 'status' => 400], 400);
        }

        // Actualización de campos
        if ($request->has('nombreproyecto')) {
            $proyecto->nombreproyecto = $request->nombreproyecto;
        }

        if ($request->has('codigo')) {
            $proyecto->codigo = $request->codigo;
        }

        // Procesa archivos de forma segura y actualiza solo si están presentes
        if ($request->hasFile('invitacionproyecto')) {
            $invitacionPath = $request->file('invitacionproyecto')->store('invitaciones', 'public');
            $proyecto->invitacionproyecto = $invitacionPath;
        }

        if ($request->hasFile('pliegoproyecto')) {
            $pliegoPath = $request->file('pliegoproyecto')->store('pliegos', 'public');
            $proyecto->pliegoproyecto = $pliegoPath;
        }

        if ($request->hasFile('listaInscrito')) {
            $listaPath = $request->file('listaInscrito')->store('lista', 'public');
            $proyecto->listaInscrito = $listaPath;
        }

        if ($request->has('fechainicioproyecto')) {
            $proyecto->fechainicioproyecto = $request->fechainicioproyecto;
        }

        if ($request->has('fechafinproyecto')) {
            $proyecto->fechafinproyecto = $request->fechafinproyecto;
        }

        if ($request->has('fechainicioinscripcion')) {
            $proyecto->fechainicioinscripcion = $request->fechainicioinscripcion;
        }

        if ($request->has('fechafininscripcion')) {
            $proyecto->fechafininscripcion = $request->fechafininscripcion;
        }

        // Guardar el proyecto actualizado
        $proyecto->save();

        return response()->json(['message' => 'Proyecto actualizado parcialmente', 'proyecto' => $proyecto, 'status' => 200], 200);
    }





}
