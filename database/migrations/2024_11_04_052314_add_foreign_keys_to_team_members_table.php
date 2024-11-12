<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->foreign(['idteam'], 'fk_team_mem_relations_teams')->references(['idteam'])->on('teams')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['iduser'], 'fk_team_mem_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropForeign('fk_team_mem_relations_teams');
            $table->dropForeign('fk_team_mem_relations_users');
        });
    }
}
