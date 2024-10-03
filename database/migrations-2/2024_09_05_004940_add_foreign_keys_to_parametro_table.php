<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToParametroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parametro', function (Blueprint $table) {
            $table->foreign(['idevaluacion'], 'fk_parametr_relations_evaluaci')->references(['idevaluacion'])->on('evaluacion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parametro', function (Blueprint $table) {
            $table->dropForeign('fk_parametr_relations_evaluaci');
        });
    }
}
