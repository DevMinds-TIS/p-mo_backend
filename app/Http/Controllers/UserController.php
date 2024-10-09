<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use App\Models\Siscode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role = $request->query('role'); // Obtener el parámetro de consulta 'role' si existe

        if ($role == 'teacher') {
            $users = User::where('idrol', 2)->get();
        } else {
            $users = User::all();
        }

        if ($users->isEmpty()) {
            return response()->json([
                "message" => "No se encontraron usuarios",
                "status" => 200
            ], 200);
        }

        return response()->json([
            'user' => $users,
            'status' => 200
        ], 200);
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
        // Validar datos comunes para todos los roles
        $commonValidator = Validator::make($request->all(), [
            'nameuser' => 'required|string|max:60',
            'lastnameuser' => 'required|string|max:60',
            'emailuser' => 'required|string|email|max:120|unique:users,emailuser',
            'passworduser' => 'required|string|min:8',
            'idrol' => 'required|integer',
        ]);

        if ($commonValidator->fails()) {
            return response()->json(['errors' => $commonValidator->errors()], 400);
        }

        $userData = [
            'nameuser' => $request->nameuser,
            'lastnameuser' => $request->lastnameuser,
            'emailuser' => $request->emailuser,
            'passworduser' => bcrypt($request->passworduser),
            'idrol' => $request->idrol,
        ];

        if ($request->idrol == 2) {
            // Validar datos específicos del rol teacher
            $teacherValidator = Validator::make($request->all(), [
                'teachertoken' => 'required|string|exists:tokens,teachertoken',
            ]);

            if ($teacherValidator->fails()) {
                return response()->json(['errors' => $teacherValidator->errors()], 400);
            }

            // Buscar el token correspondiente
            $token = Token::where('teachertoken', $request->teachertoken)->first();

            // Asignar el idtoken
            if ($token) {
                $userData['idtoken'] = $token->idtoken;
            }
        } elseif ($request->idrol == 3) {
            // Validar datos específicos del rol student
            $studentValidator = Validator::make($request->all(), [
                'siscode' => 'required|string|exists:siscode,siscode',
                'use_iduser' => 'required|integer|exists:users,iduser,idrol,2',
            ]);

            if ($studentValidator->fails()) {
                return response()->json(['errors' => $studentValidator->errors()], 400);
            }

            // Buscar el siscode correspondiente
            $siscodeRecord = Siscode::where('siscode', $request->siscode)->first();
            if ($siscodeRecord) {
                $userData['idsiscode'] = $siscodeRecord->id;
            }

            // Asignar use_iduser
            $userData['use_iduser'] = $request->use_iduser;
        }

        // Crear el usuario
        $user = User::create($userData);

        return response()->json(['message' => 'Usuario creado exitosamente', 'user' => $user], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
