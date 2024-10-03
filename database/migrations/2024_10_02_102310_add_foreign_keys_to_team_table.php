<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team', function (Blueprint $table) {
            $table->foreign(['idspace'], 'fk_team_relations_space')->references(['idspace'])->on('space')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idplanning'], 'fk_team_relations_planning')->references(['idplanning'])->on('planning')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team', function (Blueprint $table) {
            $table->dropForeign('fk_team_relations_space');
            $table->dropForeign('fk_team_relations_planning');
        });
    }
}
