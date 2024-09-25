<?php

namespace App\Http\Controllers;
use Smalot\PdfParser\Parser;
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

        // Manejo de fallos en la validación
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

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

        // Creación del proyecto con los campos de fechas
        $proyecto = Proyecto::create([
            'nombreproyecto' => $request->nombreproyecto,
            'codigo' => $request->codigo,
            'invitacionproyecto' => $invitacionPath, // Guarda la ruta del archivo
            'pliegoproyecto' => $pliegoPath,         // Guarda la ruta del archivo
            'listaInscrito' => $listaPath,
            'fechainicioproyecto' => $request->fechainicioproyecto,  // Fecha de inicio del proyecto
            'fechafinproyecto' => $request->fechafinproyecto,        // Fecha de fin del proyecto
            'fechainicioinscripcion' => $request->fechainicioinscripcion,  // Fecha de inicio de inscripción
            'fechafininscripcion' => $request->fechafininscripcion,        // Fecha de fin de inscripción
        ]);

        // Manejo de error en la creación del proyecto
        if (!$proyecto) {
            return response()->json([
                'message' => 'Error al crear proyecto',
                'status' => 501
            ], 501);
        }

        // Respuesta exitosa
        return response()->json([
            'proyecto' => $proyecto,
            'status' => 201
        ], 201);
    }


    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nombreproyecto' => 'required|string|max:60',
    //         'codigo' => 'nullable|string|max:255',
    //         'invitacionproyecto' => 'nullable|file|mimes:pdf|max:5048', // Acepta archivos PDF de hasta 5MB
    //         'pliegoproyecto' => 'nullable|file|mimes:pdf|max:5048',
    //         'listaInscrito' => 'nullable|file|mimes:pdf|max:5048',
    //     ]);
    //     // Manejo de fallos en la validación
    //     if ($validator->fails()) {
    //         $data = [
    //             'message' => 'Validation failed',
    //             'errors' => $validator->errors(),
    //             'status' => 400
    //         ];
    //         return response()->json($data, 400);
    //     }

    //     // Manejo de la subida de archivos
    //     $invitacionPath = $request->file('invitacionproyecto')
    //         ? $request->file('invitacionproyecto')->store('invitaciones', 'public')
    //         : null;

    //     $pliegoPath = $request->file('pliegoproyecto')
    //         ? $request->file('pliegoproyecto')->store('pliegos', 'public')
    //         : null;

    //     $listaPath = $request->file('listaInscrito')
    //         ? $request->file('listaInscrito')->store('lista', 'public')
    //         : null;

    //     // Creación del proyecto
    //     $proyecto = Proyecto::create([
    //         'nombreproyecto' => $request->nombreproyecto,
    //         'codigo' => $request->codigo,
    //         'invitacionproyecto' => $invitacionPath, // Guarda la ruta del archivo
    //         'pliegoproyecto' => $pliegoPath,         // Guarda la ruta del archivo
    //         'listaInscrito' => $listaPath,
    //     ]);

    //     // Manejo de error en la creación del proyecto
    //     if (!$proyecto) {
    //         $data = [
    //             'message' => 'Error al crear proyecto',
    //             'status' => 501
    //         ];
    //         return response()->json($data, 501);
    //     }

    //     // Respuesta exitosa
    //     $data = [
    //         'proyecto' => $proyecto,
    //         'status' => 201
    //     ];
    //     return response()->json($data, 201);
    // }

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



}
