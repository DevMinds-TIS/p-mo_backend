<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTable extends Migration
{
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('nombre'); // Nombre del proyecto
            $table->string('logo')->nullable(); // URL del logo de la empresa/equipo
            $table->text('descripcion')->nullable(); // Descripción del proyecto
            $table->date('inicio')->nullable(); // Fecha de inicio del proyecto
            $table->date('fin')->nullable(); // Fecha de fin del proyecto
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyecto'); // Eliminar la tabla si se revierte la migración
    }
}
