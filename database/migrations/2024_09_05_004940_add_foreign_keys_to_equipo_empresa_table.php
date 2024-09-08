<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEquipoEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipo_empresa', function (Blueprint $table) {
            $table->foreign(['idcalificacion'], 'fk_equipo_e_relations_califica')->references(['idcalificacion'])->on('calificacion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idreceptor'], 'fk_equipo_e_relations_receptor')->references(['idreceptor'])->on('receptor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idemisor'], 'fk_equipo_e_relations_emisor')->references(['idemisor'])->on('emisor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idgestion'], 'fk_equipo_e_relations_gestion')->references(['idgestion'])->on('gestion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idproyecto'], 'fk_equipo_e_relations_proyecto')->references(['idproyecto'])->on('proyecto')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipo_empresa', function (Blueprint $table) {
            $table->dropForeign('fk_equipo_e_relations_califica');
            $table->dropForeign('fk_equipo_e_relations_receptor');
            $table->dropForeign('fk_equipo_e_relations_emisor');
            $table->dropForeign('fk_equipo_e_relations_gestion');
            $table->dropForeign('fk_equipo_e_relations_proyecto');
        });
    }
}