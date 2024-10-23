<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\Auth\RegisteredUserRequest;
// use App\Models\RoleUser;
// use App\Models\Siscode;
// use App\Models\User;
// use Illuminate\Support\Facades\DB;

// class RegisteredUserController extends Controller
// {
    // public function register(RegisteredUserRequest $request)
    // {
    //     // Registrar un nuevo usuario
    //     $userData = $request->all();
    //     $userData['passworduser'] = bcrypt($request->passworduser);
    //     // Si el rol es estudiante, buscar y asignar el idsiscode
    //     if ($request->input('idrol') == 3) {
    //         $siscode = DB::table('siscode')->where('siscode', $request->input('siscode'))->first();
    //         $userData['idsiscode'] = $siscode->idsiscode;
    //     }
    //     $user = User::create($userData);

    //     // Genera el token con SANCTUM
    //     $token = $user->createToken($user->emailuser)->plainTextToken;

    //     // Guardar al usuario y su rol
    //     $role_user = RoleUser::create([
    //         "iduser" => $user->iduser,
    //         "idrol" => $request->idrol
    //     ]);

    //     $update = Siscode::create([
    //         "iduser" => $user->iduser,
    //     ]);

    //     return response()->json([
    //         "msg" => "Registro de usuario exitoso",
    //         "roleUser" => $role_user,
    //         "token" => $token,
    //         "siscode" => $update,
    //     ]);
    // }
//-----------------------------------
//     public function register(RegisteredUserRequest $request)
//     {
//         // Registrar un nuevo usuario
//         $userData = $request->all();
//         $userData['passworduser'] = bcrypt($request->passworduser);

//         if ($request->input('idrol') == 3) {
//             $siscode = DB::table('siscode')->where('siscode', $request->input('siscode'))->first();
//             $userData['idsiscode'] = $siscode->idsiscode;
//         }

//         $user = User::create($userData);

//         // Genera el token con SANCTUM
//         // $token = $user->createToken($user->emailuser)->plainTextToken;

//         // Guardar al usuario y su rol
//         $role_user = RoleUser::create([
//             "iduser" => $user->iduser,
//             "idrol" => $request->idrol
//         ]);

//         // Actualizar el siscode existente con el iduser
//         DB::table('siscode')
//             ->where('siscode', $request->input('siscode'))
//             ->update(['iduser' => $user->iduser]);

//         return response()->json([
//             "msg" => "Registro de usuario exitoso",
//             "roleUser" => $role_user,
//             // "token" => $token,
//         ]);
//     }
// }




namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisteredUserRequest;
use App\Models\RoleUser;
use App\Models\Siscode;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    public function register(RegisteredUserRequest $request)
    {
        // Registrar un nuevo usuario
        $userData = $request->all();
        $userData['passworduser'] = bcrypt($request->passworduser);

        if ($request->input('idrol') == 3) {
            $siscode = DB::table('siscode')->where('siscode', $request->input('siscode'))->first();
            $userData['idsiscode'] = $siscode->idsiscode;
        }

        $user = User::create($userData);

        // Guardar al usuario y su rol
        $role_user = RoleUser::create([
            "iduser" => $user->iduser,
            "idrol" => $request->idrol
        ]);

        // Actualizar el siscode existente con el iduser
        DB::table('siscode')
            ->where('siscode', $request->input('siscode'))
            ->update(['iduser' => $user->iduser]);

        // Llamar al método de inicio de sesión desde AuthenticatedUserController
        $loginResponse = app(AuthenticatedUserController::class)->login(
            new LoginUserRequest([
                'emailuser' => $request->emailuser,
                'passworduser' => $request->passworduser
            ])
        );

        return response()->json([
            "msg" => "Registro de usuario exitoso",
            "roleUser" => $role_user,
            "token" => $loginResponse->getData()->token
        ]);
    }
}
