<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student', function (Blueprint $table) {
            $table->foreign(['idteacher'], 'fk_student_relations_teacher')->references(['idteacher'])->on('teacher')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idteam'], 'fk_student_relations_team')->references(['idteam'])->on('team')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student', function (Blueprint $table) {
            $table->dropForeign('fk_student_relations_teacher');
            $table->dropForeign('fk_student_relations_team');
        });
    }
}
