<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPeerToPeerEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peer_to_peer_evaluation', function (Blueprint $table) {
            $table->foreign(['idac'], 'fk_peer_to__relations_assessme')->references(['idac'])->on('assessment_criteria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idsprint'], 'fk_peer_to__relations_sprint')->references(['idsprint'])->on('sprint')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idstudent_evaluator'], 'fk_peer_to_student_evaluated')->references(['idstudent'])->on('student')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idstudent_evaluated'], 'fk_peer_to_student_evaluator')->references(['idstudent'])->on('student')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peer_to_peer_evaluation', function (Blueprint $table) {
            $table->dropForeign('fk_peer_to__relations_assessme');
            $table->dropForeign('fk_peer_to__relations_sprint');
            $table->dropForeign('fk_peer_to_student_evaluated');
            $table->dropForeign('fk_peer_to_student_evaluator');
        });
    }
}
