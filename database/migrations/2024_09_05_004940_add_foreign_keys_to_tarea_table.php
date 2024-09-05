<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarea', function (Blueprint $table) {
            $table->foreign(['idhistoria'], 'fk_tarea_relations_historia')->references(['idhistoria'])->on('historia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarea', function (Blueprint $table) {
            $table->dropForeign('fk_tarea_relations_historia');
        });
    }
}
