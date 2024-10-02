<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosEquipoTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros_equipo', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('idproyecto')->constrained('proyecto')->onDelete('cascade'); // Clave foránea al proyecto
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Clave foránea al usuario
            $table->string('rol'); // Rol del miembro en el equipo
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    /**
     * Reversa la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miembros_equipo');
    }
}

