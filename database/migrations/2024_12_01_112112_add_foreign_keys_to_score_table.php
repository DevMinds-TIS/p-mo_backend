<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score', function (Blueprint $table) {
            $table->foreign(['idtask'], 'fk_score_relations_tasks')->references(['idtask'])->on('tasks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idce'], 'fk_score_relations_cross_ev')->references(['idce'])->on('cross_evaluations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idsa'], 'fk_score_relations_self_ass')->references(['idsa'])->on('self_assessments')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idpe'], 'fk_score_relations_peer_eva')->references(['idpe'])->on('peer_evaluations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idteam'], 'fk_score_relations_teams')->references(['idteam'])->on('teams')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['iduser'], 'fk_score_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idsprint'], 'fk_score_relations_sprints')->references(['idsprint'])->on('sprints')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idtracking'], 'fk_score_relations_tracking')->references(['idtracking'])->on('tracking')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idweeklie'], 'fk_score_relations_weeklies')->references(['idweeklie'])->on('weeklies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('score', function (Blueprint $table) {
            $table->dropForeign('fk_score_relations_tasks');
            $table->dropForeign('fk_score_relations_cross_ev');
            $table->dropForeign('fk_score_relations_self_ass');
            $table->dropForeign('fk_score_relations_peer_eva');
            $table->dropForeign('fk_score_relations_teams');
            $table->dropForeign('fk_score_relations_users');
            $table->dropForeign('fk_score_relations_sprints');
            $table->dropForeign('fk_score_relations_tracking');
            $table->dropForeign('fk_score_relations_weeklies');
        });
    }
}
