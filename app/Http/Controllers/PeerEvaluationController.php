<?php

namespace App\Http\Controllers;

use App\Models\PeerEvaluation;
use Illuminate\Http\Request;

class PeerEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peerEvaluations = PeerEvaluation::all();

        if($peerEvaluations->isEmpty()){
            $data = [
                "message" => "No se encontraron evaluaciones de pares",
                "status" => 200
            ];
            return response()->json($data, 200);
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeerEvaluation  $peerEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(PeerEvaluation $peerEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeerEvaluation  $peerEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(PeerEvaluation $peerEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeerEvaluation  $peerEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeerEvaluation $peerEvaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeerEvaluation  $peerEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeerEvaluation $peerEvaluation)
    {
        //
    }
}
