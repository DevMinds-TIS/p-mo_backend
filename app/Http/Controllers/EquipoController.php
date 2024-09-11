<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use Illuminate\Support\Facades\Validator;

class EquipoController extends Controller
{
    /**
     * Muestra una lista de todos los equipos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $equipos = Equipo::all();
        if ($equipos->isEmpty()) {
            $data = [
                'message' => 'No existen equipos',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        $data = [
            'equipos' => $equipos,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Almacena un nuevo equipo en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nombredelequipo' => 'required|string|max:60',
            'nombre_equipo_largo' => 'nullable|string|max:100',
            'correoequipo' => 'nullable|string|email|max:60',
            'fotodelogoEquipo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'La validación ha fallado',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $logoPath = $request->file('fotodelogoEquipo')
            ? $request->file('fotodelogoEquipo')->store('logos', 'public')
            : null;

        $equipo = Equipo::create([
            'Nombredelequipo' => $request->Nombredelequipo,
            'nombre_equipo_largo' => $request->nombre_equipo_largo,
            'correoequipo' => $request->correoequipo,
            'fotodelogoEquipo' => $logoPath,
        ]);

        if (!$equipo) {
            $data = [
                'message' => 'Error al crear el equipo',
                'status' => 501
            ];
            return response()->json($data, 501);
        }

        $data = [
            'equipo' => $equipo,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

}
