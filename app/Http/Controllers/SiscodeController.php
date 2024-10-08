<?php

namespace App\Http\Controllers;

use App\Models\Siscode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiscodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sisCode = Siscode::all();

        if ($sisCode->isEmpty()) {
            $data = [
                "message" => "No se encontraron códigos SISs",
                "status" => 200
            ];
            return response()->json($data, 200);
        }

        $data = [
            'sisCode' => $sisCode,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            // 'idspace' => 'required|integer|exists:spaces,id',
            // 'iduser' => 'required|integer|exists:users,id',
            'siscode' => 'required|string|max:20|unique:siscode,siscode',
        ]);

        // Si la validación falla, devolver un error
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear un nuevo registro en la tabla siscode
        $siscode = Siscode::create([
            // 'idspace' => $request->idspace,
            // 'iduser' => $request->iduser,
            'siscode' => $request->siscode,
        ]);

        // Devolver una respuesta exitosa
        return response()->json(['message' => 'Código SIS creado exitosamente', 'siscode' => $siscode], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siscode  $siscode
     * @return \Illuminate\Http\Response
     */
    public function show(Siscode $siscode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siscode  $siscode
     * @return \Illuminate\Http\Response
     */
    public function edit(Siscode $siscode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siscode  $siscode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siscode $siscode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siscode  $siscode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siscode $siscode)
    {
        //
    }
}
