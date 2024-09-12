<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class ActorController extends Controller
{
    public function index()
    {
        $actor = Actor::all();
        if ($actor->isEmpty()) {
            $data = [
                'message' => 'No student found',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        $data = [
            'actor' => $actor,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombreactor' => 'required|max:255',
            'apellidoactor' => 'required|max:255',
            'correoactor' => 'required|email|unique:actor',  // Cambiado 'actors' a 'actor'
            'claveactor' => 'required|min:6',
            'fotoperfilactor' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $actor = Actor::create([
            'nombreactor' => $request->nombreactor,
            'apellidoactor' => $request->apellidoactor,
            'correoactor' => $request->correoactor,
            'claveactor' => Hash::make($request->claveactor),//agregado
            'fotoperfilactor' => $request->fotoperfilactor
        ]);

        if (!$actor) {
            $data = [
                'message' => 'Error al crear actor',
                'status' => 501
            ];
            return response()->json($data, 501);  // Asegúrate de devolver la respuesta en caso de error
        }

        $data = [
            'actor' => $actor,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $actor = Actor::find($id);

        if (!$actor) {
            $data = [
                'message' => 'Actor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'actor' => $actor,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $actor = Actor::find($id);

        if (!$actor) {
            $data = [
                'message' => 'Actor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $actor->delete();
        $data = [
            'message' => 'Actor eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $actor = Actor::find($id);

        if (!$actor) {
            $data = [
                'message' => 'Actor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombreactor' => 'required|max:255',
            'apellidoactor' => 'required|max:255',
            'correoactor' => 'required|email|unique:actor,correoactor,' . $id . ',idactor', // Ignorar el ID del actor actual
            'claveactor' => 'required|min:6',
            'fotoperfilactor' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $actor->nombreactor = $request->nombreactor;
        $actor->apellidoactor = $request->apellidoactor;
        $actor->correoactor = $request->correoactor;
        $actor->claveactor = Hash::make($request->claveactor);
        $actor->fotoperfilactor = $request->fotoperfilactor;
        $actor->save();

        $data = [
            'message' => 'Actor actualizado',
            'actor' => $actor,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $actor = Actor::find($id);

        if (!$actor) {
            $data = [
                'message' => 'Actor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombreactor' => 'max:255',
            'apellidoactor' => 'max:255',
            'correoactor' => 'email|unique:actor,correoactor,' . $id . ',idactor',
            'claveactor' => 'min:6',
            'fotoperfilactor' => 'max:255'  // Ajustar validación si es necesario
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('nombreactor')) {
            $actor->nombreactor = $request->nombreactor;
        }
        if ($request->has('apellidoactor')) {
            $actor->apellidoactor = $request->apellidoactor;
        }
        if ($request->has('correoactor')) {
            $actor->correoactor = $request->correoactor;
        }
        if ($request->has('claveactor')) {
            $actor->claveactor = Hash::make($request->claveactor);
        }
        if ($request->has('fotoperfilactor')) {
            $actor->fotoperfilactor = $request->fotoperfilactor;
        }

        $actor->save();

        $data = [
            'message' => 'Actor actualizado parcialmente',
            'actor' => $actor,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function search(Request $request)
    {
        // Obtener el nombre o correo para buscar en la base de datos
        $query = Actor::query();

        if ($request->has('nombreactor')) {
            $query->where('nombreactor', 'like', '%' . $request->nombreactor . '%');
        }

        if ($request->has('correoactor')) {
            $query->where('correoactor', 'like', '%' . $request->correoactor . '%');
        }

        $actors = $query->get();

        if ($actors->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron actores',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'actors' => $actors,
            'status' => 200
        ], 200);
    }
}