<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintsTable extends Migration
{
    public function up()
    {
        Schema::create('sprints', function (Blueprint $table) {
            $table->id();  // ID del Sprint
            $table->foreignId('project_id')->constrained('Proyecto')->onDelete('cascade');
            $table->string('nombre'); // Nombre del Sprint
            $table->text('descripcion')->nullable(); // Descripción del Sprint
            $table->date('fecha_inicio'); // Fecha de inicio del Sprint
            $table->date('fecha_fin'); // Fecha de fin del Sprint
            $table->timestamps();  // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('sprints');
    }
}
