<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluacion', function (Blueprint $table) {
            $table->foreign(['idreceptor'], 'fk_evaluaci_relations_receptor')->references(['idreceptor'])->on('receptor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idemisor'], 'fk_evaluaci_relations_emisor')->references(['idemisor'])->on('emisor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluacion', function (Blueprint $table) {
            $table->dropForeign('fk_evaluaci_relations_receptor');
            $table->dropForeign('fk_evaluaci_relations_emisor');
        });
    }
}
