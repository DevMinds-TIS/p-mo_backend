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
            $table->foreign(['idproject'], 'fk_announce_relations_projects')->references(['idproject'])->on('projects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idspace'], 'fk_announce_relations_spaces')->references(['idspace'])->on('spaces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
            $table->dropForeign('fk_announce_relations_projects');
            $table->dropForeign('fk_announce_relations_spaces');
        });
    }
}
