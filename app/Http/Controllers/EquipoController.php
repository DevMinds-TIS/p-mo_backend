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
    
    //recuperar equipo por id
    public function show($id)// agregado
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return response()->json([
            'message' => 'Equipo no encontrado',
            'status' => 404
            ], 404);
        }

        return response()->json([
        'equipo' => $equipo,
        'status' => 200
        ], 200);
    }
    
    //buscar equipos por nombre o correo 
    public function search(Request $request)
    {
        $query = Equipo::query();

        if ($request->has('Nombredelequipo')) {
            $query->where('Nombredelequipo', 'like', '%' . $request->Nombredelequipo . '%');
        }

        if ($request->has('correoequipo')) {
            $query->where('correoequipo', 'like', '%' . $request->correoequipo . '%');
        }

        $equipos = $query->get();

        if ($equipos->isEmpty()) {
            return response()->json([
            'message' => 'No se encontraron equipos',
            'status' => 404
            ], 404);
        }

        return response()->json([
            'equipos' => $equipos,
            'status' => 200
        ], 200);
    }
    //editar un equipo
    public function update(Request $request, $id)
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return response()->json([
                'message' => 'Equipo no encontrado',
                'status' => 404
            ], 404);
         }

         $validator = Validator::make($request->all(), [
            'Nombredelequipo' => 'nullable|string|max:60',
            'nombre_equipo_largo' => 'nullable|string|max:100',
            'correoequipo' => 'nullable|string|email|max:60',
            'fotodelogoEquipo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'La validación ha fallado',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        if ($request->hasFile('fotodelogoEquipo')) {
            $logoPath = $request->file('fotodelogoEquipo')->store('logos', 'public');
            $equipo->fotodelogoEquipo = $logoPath;
        }

        $equipo->Nombredelequipo = $request->Nombredelequipo ?? $equipo->Nombredelequipo;
        $equipo->nombre_equipo_largo = $request->nombre_equipo_largo ?? $equipo->nombre_equipo_largo;
        $equipo->correoequipo = $request->correoequipo ?? $equipo->correoequipo;
        $equipo->save();

        return response()->json([
            'message' => 'Equipo actualizado',
            'equipo' => $equipo,
            'status' => 200
        ], 200);
    }
    //Eliminar un equipo
    public function delete($id)
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return response()->json([
                'message' => 'Equipo no encontrado',
                'status' => 404
            ], 404);
        }

        $equipo->delete();

        return response()->json([
            'message' => 'Equipo eliminado con éxito',
            'status' => 200
        ], 200);
    }
}
