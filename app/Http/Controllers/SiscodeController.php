<?php

namespace App\Http\Controllers;

use App\Models\Siscode;
use Illuminate\Http\Request;

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

        if($sisCode->isEmpty()){
            $data = [
                "message" => "No se encontraron códigos SISs",
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
