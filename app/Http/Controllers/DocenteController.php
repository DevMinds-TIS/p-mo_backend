<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Docente;

class DocenteController extends Controller
{

    public function index()
    {
        $docente = Docente::all();
        if ($docente->isEmpty()) {
            $data = [
                'message' => 'No hay docentes Registrados',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        $data = [
            'docente' => $docente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombreactor' => 'required|string|max:60',
                'apellidoactor' => 'required|string|max:60',
                'correoactor' => 'required|email|max:60|unique:actor,correoactor',
                'claveactor' => 'required|string|max:20',
            ]);

            $actor = Actor::create([
                'nombreactor' => $request->nombreactor,
                'apellidoactor' => $request->apellidoactor,
                'correoactor' => $request->correoactor,
                'claveactor' => bcrypt($request->claveactor),
                'fotoperfilactor' => $request->fotoperfilactor,
            ]);

            $docente = Docente::create([
                'idactor' => $actor->idactor,
            ]);

            return response()->json([
                'message' => 'Docente registrado correctamente',
                'docente' => $docente,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->validator->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }


}
