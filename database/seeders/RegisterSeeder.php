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
        $teacher1 = User::create([
            'nameuser' => 'Corina User',
            'lastnameuser' => 'Teacher',
            'emailuser' => 'corina@teacher.com',
            'passworduser' => bcrypt('password*'),
            'idpermission' => $permissions['corina'],
        ]);
        RoleUser::create([
            'iduser' => $teacher1->iduser,
            'idrol' => 2,
        ]);
        // Actualizar la tabla permissions con iduser
        DB::table('permissions')->where('idpermission', $permissions['corina'])->update([
            'iduser' => $teacher1->iduser,
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
        // Actualizar la tabla permissions con iduser
        DB::table('permissions')->where('idpermission', $permissions['leticia'])->update([
            'iduser' => $teacher2->iduser,
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
        // Actualizar la tabla permissions con iduser
        DB::table('permissions')->where('idpermission', $permissions['david'])->update([
            'iduser' => $teacher3->iduser,
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
        // Actualizar la tabla permissions con iduser
        DB::table('permissions')->where('idpermission', $permissions['patricia'])->update([
            'iduser' => $teacher4->iduser,
        ]);

        // Student 1 User------------------------------

        // Obtener el siscode antes de crear el student
        $siscode1 = DB::table('siscode')->where('siscode', '202400001')->first();

        // Crear el student
        $student1 = User::create([
            'nameuser' => 'Student 1 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student1@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => $siscode1->idsiscode,
            'use_iduser' => $teacher1->iduser,
        ]);

        // Asignar el rol al student
        RoleUser::create([
            'iduser' => $student1->iduser,
            'idrol' => 3,
        ]);

        // Actualizar la tabla siscode con iduser
        DB::table('siscode')->where('siscode', '202400001')->update([
            'iduser' => $student1->iduser,
        ]);

        // Student 2 User------------------------------

        // Obtener el siscode antes de crear el student
        $siscode2 = DB::table('siscode')->where('siscode', '202400002')->first();

        // Crear el student
        $student2 = User::create([
            'nameuser' => 'Student 2 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student2@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => $siscode2->idsiscode,
            'use_iduser' => $teacher1->iduser,
        ]);

        // Asignar el rol al student
        RoleUser::create([
            'iduser' => $student2->iduser,
            'idrol' => 3,
        ]);

        // Actualizar la tabla siscode con iduser
        DB::table('siscode')->where('siscode', '202400002')->update([
            'iduser' => $student2->iduser,
        ]);

        // Student 3 User------------------------------
        
        // Obtener el siscode antes de crear el student
        $siscode3 = DB::table('siscode')->where('siscode', '202400003')->first();

        // Crear el student
        $student3 = User::create([
            'nameuser' => 'Student 3 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student3@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => $siscode3->idsiscode,
            'use_iduser' => $teacher1->iduser,
        ]);

        // Asignar el rol al student
        RoleUser::create([
            'iduser' => $student3->iduser,
            'idrol' => 3,
        ]);

        // Actualizar la tabla siscode con iduser
        DB::table('siscode')->where('siscode', '202400003')->update([
            'iduser' => $student3->iduser,
        ]);

        // Student 4 User------------------------------
        
        // Obtener el siscode antes de crear el student
        $siscode4 = DB::table('siscode')->where('siscode', '202400004')->first();

        // Crear el student
        $student4 = User::create([
            'nameuser' => 'Student 4 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student4@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => $siscode4->idsiscode,
            'use_iduser' => $teacher1->iduser,
        ]);

        // Asignar el rol al student
        RoleUser::create([
            'iduser' => $student4->iduser,
            'idrol' => 3,
        ]);

        // Actualizar la tabla siscode con iduser
        DB::table('siscode')->where('siscode', '202400004')->update([
            'iduser' => $student4->iduser,
        ]);

        // Student 5 User------------------------------
        
        // Obtener el siscode antes de crear el student
        $siscode5 = DB::table('siscode')->where('siscode', '202400005')->first();

        // Crear el student
        $student5 = User::create([
            'nameuser' => 'Student 5 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student5@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => $siscode5->idsiscode,
            'use_iduser' => $teacher1->iduser,
        ]);

        // Asignar el rol al student
        RoleUser::create([
            'iduser' => $student5->iduser,
            'idrol' => 3,
        ]);

        // Actualizar la tabla siscode con iduser
        DB::table('siscode')->where('siscode', '202400005')->update([
            'iduser' => $student5->iduser,
        ]);

        // Student 6 User------------------------------
        
        // Obtener el siscode antes de crear el student
        $siscode6 = DB::table('siscode')->where('siscode', '202400006')->first();

        // Crear el student
        $student6 = User::create([
            'nameuser' => 'Student 6 User',
            'lastnameuser' => 'Student',
            'emailuser' => 'student6@example.com',
            'passworduser' => bcrypt('password*'),
            'idsiscode' => $siscode6->idsiscode,
            'use_iduser' => $teacher1->iduser,
        ]);

        // Asignar el rol al student
        RoleUser::create([
            'iduser' => $student6->iduser,
            'idrol' => 3,
        ]);

        // Actualizar la tabla siscode con iduser
        DB::table('siscode')->where('siscode', '202400006')->update([
            'iduser' => $student6->iduser,
        ]);
    }
}
