<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInicioAndFinToProyectosTable extends Migration
{
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->date('inicio')->nullable(); // Campo de inicio del proyecto
            $table->date('fin')->nullable();    // Campo de fin del proyecto
        });
    }

    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn(['inicio', 'fin']);
        });
    }
}