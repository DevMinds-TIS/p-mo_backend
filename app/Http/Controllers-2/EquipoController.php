<?php

namespace App\Http\Controllers;
use App\Models\Actor;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Proyecto;
use App\Models\EquipoMiembro;
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

    public function indexTabla()
    {
        $equipos = EquipoMiembro::all();

        if ($equipos->isEmpty()) {
            return response()->json([
                'message' => 'No existen equipos'
            ], 204); // Cambié el código a 204 si no hay equipos
        }

        return response()->json([
            'equipos' => $equipos
        ], 200);
    }




    /**
     * Almacena un nuevo equipo en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $validator = Validator::make($request->all(), [
            'Nombredelequipo' => 'required|string|max:60',
            'nombre_equipo_largo' => 'nullable|string|max:100',
            'correoequipo' => 'nullable|string|email|max:60',
            'fotodelogoEquipo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Acepta imágenes de hasta 2MB
            'idproyecto' => 'required|exists:proyecto,idproyecto',
            'idestudiante' => 'nullable|exists:estudiante,idestudiante', // Asegúrate de validar el id del estudiante si es necesario

        ]);

        // Manejo de errores de validación
        if ($validator->fails()) {
            return response()->json([
                'message' => 'La validación ha fallado',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        // Manejo de la imagen del logo del equipo
        $logoPath = $request->hasFile('fotodelogoEquipo')
            ? $request->file('fotodelogoEquipo')->store('logos', 'public')
            : null;

        // Crear el equipo
        // $equipo = Equipo::create([
        //     'Nombredelequipo' => $request->Nombredelequipo,
        //     'idproyecto' => $request->idproyecto,
        //     'nombre_equipo_largo' => $request->nombre_equipo_largo,
        //     'correoequipo' => $request->correoequipo,
        //     'fotodelogoEquipo' => $logoPath,
        //     'idestudiante' => $request->idestudiante,
        // ]);
        try {
            $equipo = Equipo::create([
                'Nombredelequipo' => $request->Nombredelequipo,
                'idproyecto' => $request->idproyecto,
                'nombre_equipo_largo' => $request->nombre_equipo_largo,
                'correoequipo' => $request->correoequipo,
                'fotodelogoEquipo' => $logoPath,
                'idestudiante' => $request->idestudiante,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al crear el equipo',
                'error' => $e->getMessage(),
                'status' => 501
            ], 501);
        }


        // Manejo de errores al crear el equipo
        if (!$equipo) {
            return response()->json([
                'message' => 'Error al crear el equipo',
                'status' => 501
            ], 501);
        }

        // Guardar los actores con sus roles
        foreach ($request->actores as $actor) {
            $equipo->actores()->attach($actor['id'], ['rol' => $actor['rol']]);
        }

        // Cargar la relación correcta de 'actores'
        $data = [
            'equipo' => $equipo->load('actores'), // Cargar los actores
            'status' => 201
        ];

        return response()->json($data, 201);
    }


    //recuperar equipo por id
    public function show($id)// agregado
    {
        $equipo = Equipo::with('actores')->find($id);

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


    public function obtenerEquiposPorUsuario($id)
    {
        // Obtener todos los registros de EquipoMiembro donde el actor_id es igual al ID proporcionado
        $equipos = EquipoMiembro::with(['equipo', 'equipo.actores']) // Cargar la relación del equipo y los actores del equipo
            ->where('actor_id', $id)
            ->get();

        // Retornar los equipos en formato JSON
        return response()->json($equipos);
    }

}
