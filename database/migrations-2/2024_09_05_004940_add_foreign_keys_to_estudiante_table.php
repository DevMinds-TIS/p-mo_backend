<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiante', function (Blueprint $table) {
            $table->foreign(['idactor'], 'fk_estudian_relations_actor')->references(['idactor'])->on('actor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idreceptor'], 'fk_estudian_relations_receptor')->references(['idreceptor'])->on('receptor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idemisor'], 'fk_estudian_relations_emisor')->references(['idemisor'])->on('emisor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idgrupo'], 'fk_estudian_relations_grupo')->references(['idgrupo'])->on('grupo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idequipo'], 'fk_estudian_relations_equipo_e')->references(['idequipo'])->on('equipo_empresa')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudiante', function (Blueprint $table) {
            $table->dropForeign('fk_estudian_relations_actor');
            $table->dropForeign('fk_estudian_relations_receptor');
            $table->dropForeign('fk_estudian_relations_emisor');
            $table->dropForeign('fk_estudian_relations_grupo');
            $table->dropForeign('fk_estudian_relations_equipo_e');
        });
    }
}
