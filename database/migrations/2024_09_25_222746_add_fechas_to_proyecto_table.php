<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechasToProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyecto', function (Blueprint $table) {
            // Añadir los nuevos campos de fecha
            $table->date('fechainicioproyecto')->nullable()->after('pliegoproyecto');
            $table->date('fechafinproyecto')->nullable()->after('fechainicioproyecto');
            $table->date('fechainicioinscripcion')->nullable()->after('fechafinproyecto');
            $table->date('fechafininscripcion')->nullable()->after('fechainicioinscripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyecto', function (Blueprint $table) {
            // Eliminar los campos añadidos si se revierte la migración
            $table->dropColumn('fechainicioproyecto');
            $table->dropColumn('fechafinproyecto');
            $table->dropColumn('fechainicioinscripcion');
            $table->dropColumn('fechafininscripcion');
        });
    }
}
