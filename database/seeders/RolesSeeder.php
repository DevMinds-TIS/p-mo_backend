<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Siscode;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear Roles
        Role::create([
            'namerol' => 'Administrador',
            'iconrol' => 'ManagerIcon'
        ]);
        Role::create([
            'namerol' => 'Docente',
            'iconrol' => 'TeacherIcon'
        ]);
        Role::create([
            'namerol' => 'Estudiante',
            'iconrol' => 'StudentIcon'
        ]);
        Role::create([
            'namerol' => 'Representante legal',
            'iconrol' => 'HierarchyIcon'
        ]);
        Role::create([
            'namerol' => 'Miembro de equipo',
            'iconrol' => 'UserGroupIcon'
        ]);
        Role::create([
            'namerol' => 'Product Owner',
            'iconrol' => 'ConversationIcon'
        ]);
        Role::create([
            'namerol' => 'Scrum master',
            'iconrol' => 'AccountSetting03Icon'
        ]);
        Role::create([
            'namerol' => 'Scrum team',
            'iconrol' => 'ConferenceIcon'
        ]);
    }
}
