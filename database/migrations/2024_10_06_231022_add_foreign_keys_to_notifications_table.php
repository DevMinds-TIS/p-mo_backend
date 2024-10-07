<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign(['idstudent'], 'fk_notifica_relations_student')->references(['idstudent'])->on('student')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idteacher'], 'fk_notifica_relations_teacher')->references(['idteacher'])->on('teacher')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign('fk_notifica_relations_student');
            $table->dropForeign('fk_notifica_relations_teacher');
        });
    }
}
