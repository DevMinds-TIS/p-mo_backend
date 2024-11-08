<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign(['iduser'], 'fk_role_use_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idrol'], 'fk_role_use_relations_roles')->references(['idrol'])->on('roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idteammember'], 'fk_role_use_relations_team_mem')->references(['idteammember'])->on('team_members')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('fk_role_use_relations_users');
            $table->dropForeign('fk_role_use_relations_roles');
            $table->dropForeign('fk_role_use_relations_team_mem');
        });
    }
}
