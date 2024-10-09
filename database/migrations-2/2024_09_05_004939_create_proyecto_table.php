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
            $table->timestamps();
            $table->bigIncrements('idproyecto')->unique('proyecto_pk');
            $table->string('nombreproyecto', 60)->nullable();
            $table->string('codigo')->nullable();
            $table->string('invitacionproyecto', 255)->nullable();
            $table->string('pliegoproyecto', 255)->nullable();
            
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