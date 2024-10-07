<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->foreign(['idwes'], 'fk_task_relations_weekly_e')->references(['idwes'])->on('weekly_eva_spreadsheet')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idstudent'], 'fk_task_relations_student')->references(['idstudent'])->on('student')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->dropForeign('fk_task_relations_weekly_e');
            $table->dropForeign('fk_task_relations_student');
        });
    }
}
