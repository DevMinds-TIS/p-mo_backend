<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Permission;
use App\Models\RoleUser;
use App\Models\Role;

class CredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generar un permiso aleatorio de 10 caracteres
        $randomPermission = Str::random(10);

        // Crear el primer usuario
        $user = User::create([
            'nameuser' => 'Corina Justina',
            'lastnameuser' => 'Flores Villarroel',
            'emailuser' => 'corinaflores.v@fcyt.umss.edu.bo',
            'passworduser' => Hash::make('password*'),
        ]);

        // Asignar un permiso al primer usuario
        Permission::create([
            'iduser' => $user->iduser,
            'teacherpermission' => $randomPermission,
        ]);

        // Buscar el rol 'Docente' por nombre
        $docenteRole = Role::where('namerol', 'Docente')->first();
        // Alternativamente, si el idrol es 2
        // $docenteRoleId = 2;

        // Asignar el rol de 'Docente' al primer usuario
        RoleUser::create([
            'iduser' => $user->iduser,
            'idrol' => $docenteRole->idrol,
        ]);

        // Crear el segundo usuario (Administrador)
        $adminUser = User::create([
            'nameuser' => 'Project',
            'lastnameuser' => 'Management Officer',
            'emailuser' => 'pmo.umss@gmail.com',
            'passworduser' => Hash::make('password*'),
        ]);

        // Buscar el rol 'Administrador' por nombre
        $adminRole = Role::where('namerol', 'Administrador')->first();
        // Alternativamente, si el idrol es 1
        // $adminRoleId = 1;

        // Asignar el rol de 'Administrador' al segundo usuario
        RoleUser::create([
            'iduser' => $adminUser->iduser,
            'idrol' => $adminRole->idrol,
        ]);
    }
}