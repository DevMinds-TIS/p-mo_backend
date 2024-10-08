<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSelfAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('self_assessment', function (Blueprint $table) {
            $table->foreign(['idac'], 'fk_self_ass_relations_assessme')->references(['idac'])->on('assessment_criteria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idplanning'], 'fk_self_ass_relations_planning')->references(['idplanning'])->on('planning')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idstudent'], 'fk_self_ass_relations_student')->references(['idstudent'])->on('student')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('self_assessment', function (Blueprint $table) {
            $table->dropForeign('fk_self_ass_relations_assessme');
            $table->dropForeign('fk_self_ass_relations_planning');
            $table->dropForeign('fk_self_ass_relations_student');
        });
    }
}
