<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSpaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('space', function (Blueprint $table) {
            $table->foreign(['idproject'], 'fk_space_relations_project')->references(['idproject'])->on('project')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idteacher'], 'fk_space_relations_teacher')->references(['idteacher'])->on('teacher')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('space', function (Blueprint $table) {
            $table->dropForeign('fk_space_relations_project');
            $table->dropForeign('fk_space_relations_teacher');
        });
    }
}
