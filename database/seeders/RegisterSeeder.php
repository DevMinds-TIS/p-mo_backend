<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Siscode;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear Roles
        Role::create(['namerol' => 'admin']);
        Role::create(['namerol' => 'teacher']);
        Role::create(['namerol' => 'student']);

        // Insertar permisos para los docentes
        Permission::create(['teacherpermission' => 'corina']);
        Permission::create(['teacherpermission' => 'leticia']);
        Permission::create(['teacherpermission' => 'david']);
        Permission::create(['teacherpermission' => 'patricia']);

        // Insertar códigos SIS
        Siscode::create(['siscode' => '202400001']);
        Siscode::create(['siscode' => '202400002']);
        Siscode::create(['siscode' => '202400003']);
        Siscode::create(['siscode' => '202400004']);
        Siscode::create(['siscode' => '202400005']);
        Siscode::create(['siscode' => '202400006']);

        // Obtener los permisos insertados
        $permissions = DB::table('permissions')->pluck('idpermission', 'teacherpermission');

        // Crear los usuarios con los roles y permisos correctos
        // Admin User
        $admin = User::create([
            'nameuser' => 'Admin User',
            'lastnameuser' => 'Admin',
            'emailuser' => 'admin@example.com',
            'passworduser' => bcrypt('password*'),
        ]);
        RoleUser::create([
            'iduser' => $admin->iduser,
            'idrol' => 1,
        ]);

        // Teacher 1 User
        $teacher = User::create([
            'nameuser' => 'Corina User',
            'lastnameuser' => 'Teacher',
            'emailuser' => 'corina@teacher.com',
            'passworduser' => bcrypt('password*'),
            'idpermission' => $permissions['corina'],
        ]);
        RoleUser::create([
            'iduser' => $teacher->iduser,
            'idrol' => 2,
        ]);

        // Teacher 2 User
        $teacher2 = User::create([
            'nameuser' => 'Leticia User',
            'lastnameuser' => 'Teacher',
            'emailuser' => 'leticia@teacher.com',
            'passworduser' => bcrypt('password*'),
            'idpermission' => $permissions['leticia'],
        ]);
        RoleUser::create([
            'iduser' => $teacher2->iduser,
            'idrol' => 2,
        ]);

        // Teacher 3 User
        $teacher3 = User::create([
            'nameuser' => 'David User',
            'lastnameuser' => 'Teacher',
            'emailuser' => 'david@teacher.com',
            'passworduser' => bcrypt('password*'),
            'idpermission' => $permissions['david'],
        ]);
        RoleUser::create([
            'iduser' => $teacher3->iduser,
            'idrol' => 2,
        ]);

        // Teacher 4 User
        $teacher4 = User::create([
            'nameuser' => 'Patricia User',
            'lastnameuser' => 'Teacher',
            'emailuser' => 'patricia@teacher.com',
            'passworduser' => bcrypt('password*'),
            'idpermission' => $permissions['patricia'],
        ]);
        RoleUser::create([
            'iduser' => $teacher4->iduser,
            'idrol' => 2,
        ]);

        // Student 1 User------------------------------
        $student = User::create([
            'nameuser' => 'Student 1 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student1@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => 1,
            'use_iduser' => $teacher->iduser,
        ]);
        RoleUser::create([
            'iduser' => $student->iduser,
            'idrol' => 3,
        ]);
        // Asigna el código SIS al estudiante
        $siscode = DB::table('siscode')->where('siscode', '202400001')->first();
        DB::table('siscode')->where('siscode', '202400001')->update(['iduser' => $student->iduser]);

        // Student 2 User------------------------------
        $student2 = User::create([
            'nameuser' => 'Student 2 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student2@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => 2,
            'use_iduser' => $teacher->iduser,
        ]);
        RoleUser::create([
            'iduser' => $student2->iduser,
            'idrol' => 3,
        ]);
        // Asigna el código SIS al estudiante
        $siscode2 = DB::table('siscode')->where('siscode', '202400002')->first();
        DB::table('siscode')->where('siscode', '202400002')->update(['iduser' => $student2->iduser]);

        // Student 3 User------------------------------
        $student3 = User::create([
            'nameuser' => 'Student 3 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student3@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => 3,
            'use_iduser' => $teacher->iduser,
        ]);
        RoleUser::create([
            'iduser' => $student3->iduser,
            'idrol' => 3,
        ]);
        // Asigna el código SIS al estudiante
        $siscode3 = DB::table('siscode')->where('siscode', '202400003')->first();
        DB::table('siscode')->where('siscode', '202400003')->update(['iduser' => $student3->iduser]);

        // Student 4 User------------------------------
        $student4 = User::create([
            'nameuser' => 'Student 4 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student4@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => 4,
            'use_iduser' => $teacher->iduser,
        ]);
        RoleUser::create([
            'iduser' => $student4->iduser,
            'idrol' => 3,
        ]);
        // Asigna el código SIS al estudiante
        $siscode4 = DB::table('siscode')->where('siscode', '202400004')->first();
        DB::table('siscode')->where('siscode', '202400004')->update(['iduser' => $student4->iduser]);

        // Student 5 User------------------------------
        $student5 = User::create([
            'nameuser' => 'Student 5 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student5@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => 5,
            'use_iduser' => $teacher->iduser,
        ]);
        RoleUser::create([
            'iduser' => $student5->iduser,
            'idrol' => 3,
        ]);
        // Asigna el código SIS al estudiante
        $siscode5 = DB::table('siscode')->where('siscode', '202400005')->first();
        DB::table('siscode')->where('siscode', '202400005')->update(['iduser' => $student5->iduser]);

        // Student 6 User------------------------------
        $student6 = User::create([
            'nameuser' => 'Student 6 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student6@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => 6,
            'use_iduser' => $teacher->iduser,
        ]);
        RoleUser::create([
            'iduser' => $student6->iduser,
            'idrol' => 3,
        ]);
        // Asigna el código SIS al estudiante
        $siscode6 = DB::table('siscode')->where('siscode', '202400006')->first();
        DB::table('siscode')->where('siscode', '202400006')->update(['iduser' => $student6->iduser]);
    }
}
