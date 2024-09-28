<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
// database/migrations/xxxx_xx_xx_create_tasks_table.php
    public function up()
{
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sprint_id')->constrained()->onDelete('cascade');
            $table->string('nombre');
            $table->enum('estado', ['Pending', 'In Progress', 'Completed']);
            $table->integer('progreso')->default(0); // Progreso en porcentaje
            $table->foreignId('asignado_a')->constrained('users')->onDelete('set null'); // Usuario asignado
            $table->integer('puntos')->nullable();
            $table->string('rol');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
        });
    }
}
