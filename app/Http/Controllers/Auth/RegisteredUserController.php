<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterStudentRequest;
use App\Http\Requests\Auth\RegisterTeacherRequest;
use App\Http\Requests\Auth\RegisterAdminRequest;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function registerAdmin(RegisterAdminRequest $request)
    {
        $userData = $request->all();
        $userData['passworduser'] = bcrypt($request->passworduser);

        $user = User::create($userData);

        $role_user = RoleUser::create([
            "iduser" => $user->iduser,
            "idrol" => $request->idrol
        ]);

        $loginResponse = app(AuthenticatedUserController::class)->login(
            new LoginUserRequest([
                'emailuser' => $request->emailuser,
                'passworduser' => $request->passworduser
            ])
        );

        return response()->json([
            "msg" => "Registro de administrador exitoso",
            "token" => $loginResponse->getData()->token
        ]);
    }

    public function registerStudent(RegisterStudentRequest $request)
    {
        $userData = $request->all();
        $userData['passworduser'] = bcrypt($request->passworduser);

        $siscode = DB::table('siscode')->where('siscode', $request->input('siscode'))->first();
        $userData['idsiscode'] = $siscode->idsiscode;

        $roleUser = DB::table("role_user")->where("iduser", $request->input('use_iduser'))->where("idrol", 2)->first();
        if (!$roleUser) {
            return response()->json(["msg" => "El docente asignado no existe o no tiene el rol de docente."], 400);
        }

        $user = User::create($userData);

        RoleUser::create([
            "iduser" => $user->iduser,
            "idrol" => $request->idrol
        ]);

        DB::table('siscode')->where('siscode', $request->input('siscode'))->update(['iduser' => $user->iduser]);

        $loginResponse = app(AuthenticatedUserController::class)->login(
            new LoginUserRequest([
                'emailuser' => $request->emailuser,
                'passworduser' => $request->passworduser
            ])
        );

        return response()->json([
            "msg" => "Registro de estudiante exitoso",
            "token" => $loginResponse->getData()->token
        ]);
    }


    public function registerTeacher(RegisterTeacherRequest $request)
    {
        $userData = $request->all();
        $userData['passworduser'] = bcrypt($request->passworduser);

        $permission = DB::table('permissions')->where('teacherpermission', $request->input('teacherpermission'))->first();
        if (!$permission) {
            return response()->json(["msg" => "Permiso de profesor inválido."], 400);
        }
        $userData['idpermission'] = $permission->idpermission;

        $user = User::create($userData);

        RoleUser::create([
            "iduser" => $user->iduser,
            "idrol" => $request->idrol
        ]);

        DB::table('permissions')->where('idpermission', $permission->idpermission)->update([
            'iduser' => $user->iduser,
        ]);

        $loginResponse = app(AuthenticatedUserController::class)->login(
            new LoginUserRequest([
                'emailuser' => $request->emailuser,
                'passworduser' => $request->passworduser
            ])
        );

        return response()->json([
            "msg" => "Registro de profesor exitoso",
            "token" => $loginResponse->getData()->token
        ]);
    }
}
