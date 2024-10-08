<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trackings = Tracking::all();

        if ($trackings->isEmpty()) {
            $data = [
                "message" => "No se encontraron planillas de seguimiento",
                "status" => 200
            ];
            return response()->json($data, 200);
        }

        $data = [
            'tracking' => $trackings,
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
        // Validar los datos del request
        $validator = Validator::make($request->all(), [
            'idsprint' => 'required|integer|exists:sprints,idsprint',
            'iduser' => 'required|integer|exists:users,iduser',
            'nametracking' => 'required|string|max:90',
            'deliverytracking' => 'nullable|date',
            'returntracking' => 'nullable|date|after_or_equal:deliverytracking',
            'statustracking' => 'required|string|max:90',
            'commenttracking' => 'nullable|string|max:180',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear un nuevo tracking con los datos validados
        $tracking = Tracking::create($validator->validated());

        // Responder con el tracking creado
        return response()->json(['message' => 'Tracking creado exitosamente', 'tracking' => $tracking], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracking $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracking $tracking)
    {
        //
    }
}
