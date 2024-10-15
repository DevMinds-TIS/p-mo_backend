<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->foreign(['idweeklie'], 'fk_stories_relations_weeklies')->references(['idweeklie'])->on('weeklies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['iduser'], 'fk_stories_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->dropForeign('fk_stories_relations_weeklies');
            $table->dropForeign('fk_stories_relations_users');
        });
    }
}
