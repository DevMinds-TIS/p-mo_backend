<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->foreign(['idspace'], 'fk_announce_relations_space')->references(['idspace'])->on('space')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idproject'], 'fk_announce_relations_project')->references(['idproject'])->on('project')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropForeign('fk_announce_relations_space');
            $table->dropForeign('fk_announce_relations_project');
        });
    }
}
