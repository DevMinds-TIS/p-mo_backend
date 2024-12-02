<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCrossEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cross_evaluations', function (Blueprint $table) {
            $table->foreign(['idplanning'], 'fk_cross_ev_relations_planning')->references(['idplanning'])->on('planning')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idcriteria'], 'fk_cross_ev_relations_criteria')->references(['idcriteria'])->on('criteria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idteam'], 'fk_cross_ev_relations_teams')->references(['idteam'])->on('teams')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cross_evaluations', function (Blueprint $table) {
            $table->dropForeign('fk_cross_ev_relations_planning');
            $table->dropForeign('fk_cross_ev_relations_criteria');
            $table->dropForeign('fk_cross_ev_relations_teams');
        });
    }
}
