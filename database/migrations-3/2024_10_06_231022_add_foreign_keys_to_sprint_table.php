<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sprint', function (Blueprint $table) {
            $table->foreign(['idplanning'], 'fk_sprint_relations_planning')->references(['idplanning'])->on('planning')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sprint', function (Blueprint $table) {
            $table->dropForeign('fk_sprint_relations_planning');
        });
    }
}
