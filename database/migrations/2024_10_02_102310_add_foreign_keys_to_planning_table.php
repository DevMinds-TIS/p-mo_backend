<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPlanningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planning', function (Blueprint $table) {
            $table->foreign(['idteam'], 'fk_planning_relations_team')->references(['idteam'])->on('team')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planning', function (Blueprint $table) {
            $table->dropForeign('fk_planning_relations_team');
        });
    }
}
