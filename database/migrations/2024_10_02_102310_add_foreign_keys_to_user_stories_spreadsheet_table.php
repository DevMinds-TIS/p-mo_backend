<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserStoriesSpreadsheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_stories_spreadsheet', function (Blueprint $table) {
            $table->foreign(['idsprint'], 'fk_user_sto_relations_sprint')->references(['idsprint'])->on('sprint')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idstudent'], 'fk_user_sto_relations_student')->references(['idstudent'])->on('student')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_stories_spreadsheet', function (Blueprint $table) {
            $table->dropForeign('fk_user_sto_relations_sprint');
            $table->dropForeign('fk_user_sto_relations_student');
        });
    }
}
