<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdestudianteToEquipoEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipo_empresa', function (Blueprint $table) {
            $table->integer('idestudiante')->nullable()->index('idestudiante_fk'); // Agregar el campo idestudiante
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
            $table->dropColumn('idestudiante'); // Eliminar el campo en caso de revertir
        });
    }
}
