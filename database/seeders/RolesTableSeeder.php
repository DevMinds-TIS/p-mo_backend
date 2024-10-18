<?php

namespace Database\Seeders;

use App\Models\Role;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        Role::truncate();

        // $faker = Factory::create();
        // Crear los roles
        Role::create(['namerol' => 'admin']);
        Role::create(['namerol' => 'teacher']);
        Role::create(['namerol' => 'student']);
    }
}
