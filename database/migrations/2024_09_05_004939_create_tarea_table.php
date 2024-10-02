<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea', function (Blueprint $table) {
            $table->integer('idtarea')->primary();
            $table->foreignId('sprint_id')->constrained()->onDelete('cascade');
            $table->integer('idhistoria')->nullable()->index('relationship_9_fk');
            $table->string('nombretarea', 60)->nullable();
            $table->enum('estado', ['Pending', 'In Progress', 'Completed']);
            $table->integer('progreso')->default(0); // Progreso en porcentaje
            $table->foreignId('asignado_a')->constrained('users')->onDelete('set null'); // Usuario asignado
            $table->integer('puntos')->nullable();
            $table->string('rol');
            $table->string('descripciontarea', 180)->nullable();
            $table->date('fechainiciotarea')->nullable();
            $table->date('fechafintarea')->nullable();
            $table->string('mockuptarea')->nullable();

            $table->unique(['idtarea'], 'tarea_pk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarea');
    }
}