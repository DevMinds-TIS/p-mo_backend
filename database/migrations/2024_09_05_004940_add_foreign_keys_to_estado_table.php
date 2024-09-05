<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEstadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estado', function (Blueprint $table) {
            $table->foreign(['idhistoria'], 'fk_estado_relations_historia')->references(['idhistoria'])->on('historia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idtarea'], 'fk_estado_relations_tarea')->references(['idtarea'])->on('tarea')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idsprint'], 'fk_estado_relations_sprint')->references(['idsprint'])->on('sprint')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idparametro'], 'fk_estado_relations_parametr')->references(['idparametro'])->on('parametro')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estado', function (Blueprint $table) {
            $table->dropForeign('fk_estado_relations_historia');
            $table->dropForeign('fk_estado_relations_tarea');
            $table->dropForeign('fk_estado_relations_sprint');
            $table->dropForeign('fk_estado_relations_parametr');
        });
    }
}
