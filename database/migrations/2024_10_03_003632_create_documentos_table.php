<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->integer('sprint_id')->unsigned(); //  sprint_id exista
            $table->string('nombre'); // Nombre del documento
            $table->string('tipo'); // Acta, Historia de usuario, Test plan, Reporte de sprint
            $table->string('ruta'); // Ruta donde se almacenará el archivo
            $table->date('fecha_subida'); // Fecha en que se subió el documento
            $table->enum('estado', ['pendiente', 'revisado', 'aprobado'])->default('pendiente'); // Estado del documento
            $table->date('fecha_revision')->nullable(); // Fecha en la que fue revisado
            $table->timestamps();

            // Aquí es donde agregas la clave foránea
            $table->foreign('sprint_id')->references('idsprint')->on('sprint')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}

