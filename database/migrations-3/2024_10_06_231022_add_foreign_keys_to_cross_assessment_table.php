<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCrossAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cross_assessment', function (Blueprint $table) {
            $table->foreign(['idac'], 'fk_cross_as_relations_assessme')->references(['idac'])->on('assessment_criteria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idplanning'], 'fk_cross_as_relations_planning')->references(['idplanning'])->on('planning')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idevaluation_team'], 'fk_cross_as_team_evaluated')->references(['idteam'])->on('team')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idevaluated_team'], 'fk_cross_as_team_evaluator')->references(['idteam'])->on('team')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cross_assessment', function (Blueprint $table) {
            $table->dropForeign('fk_cross_as_relations_assessme');
            $table->dropForeign('fk_cross_as_relations_planning');
            $table->dropForeign('fk_cross_as_team_evaluated');
            $table->dropForeign('fk_cross_as_team_evaluator');
        });
    }
}
