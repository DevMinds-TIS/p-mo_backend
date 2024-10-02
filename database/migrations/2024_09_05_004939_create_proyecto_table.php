<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->bigIncrements('idproyecto')->unique('proyecto_pk');
            $table->string('nombreproyecto', 60)->nullable();
            $table->string('logo')->nullable(); // URL del logo de la empresa/equipo
            $table->text('descripcion')->nullable(); // Descripción del proyecto
            $table->string('codigo')->nullable();
            $table->date('inicio')->nullable(); // Fecha de inicio del proyecto
            $table->date('fin')->nullable(); // Fecha de fin del proyecto
            $table->string('invitacionproyecto', 255)->nullable();
            $table->string('pliegoproyecto', 255)->nullable();
            $table->timestamps();
            
        });
    }

    /**s
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
}