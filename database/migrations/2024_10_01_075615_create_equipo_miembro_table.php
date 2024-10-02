<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoMiembroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_miembro', function (Blueprint $table) {
            $table->id(); // ID de la relación
            $table->unsignedBigInteger('equipo_id'); // ID del equipo
            $table->unsignedBigInteger('actor_id'); // ID del actor (miembro)
            $table->string('rol'); // Rol del miembro en el equipo
            $table->timestamps(); // Marca de tiempo de creación y actualización

            // Claves foráneas
            $table->foreign('equipo_id')->references('idequipo')->on('equipo_empresa')->onDelete('cascade');
            $table->foreign('actor_id')->references('idactor')->on('actor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_miembro'); // Eliminar la tabla si existe
    }
}
