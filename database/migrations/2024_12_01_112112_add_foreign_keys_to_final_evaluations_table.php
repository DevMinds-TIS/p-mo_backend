<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFinalEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('final_evaluations', function (Blueprint $table) {
            $table->foreign(['idcriteria'], 'fk_final_ev_relations_criteria')->references(['idcriteria'])->on('criteria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['iduser'], 'fk_final_ev_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idteam'], 'fk_final_ev_relations_teams')->references(['idteam'])->on('teams')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('final_evaluations', function (Blueprint $table) {
            $table->dropForeign('fk_final_ev_relations_criteria');
            $table->dropForeign('fk_final_ev_relations_users');
            $table->dropForeign('fk_final_ev_relations_teams');
        });
    }
}
