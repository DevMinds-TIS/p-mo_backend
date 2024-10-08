<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToWeekliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weeklies', function (Blueprint $table) {
            $table->foreign(['idsprint'], 'fk_weeklies_relations_sprints')->references(['idsprint'])->on('sprints')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weeklies', function (Blueprint $table) {
            $table->dropForeign('fk_weeklies_relations_sprints');
        });
    }
}
