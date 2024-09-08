<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion', function (Blueprint $table) {
            $table->integer('idcalificacion')->primary();
            $table->integer('idevaluacion')->nullable()->index('relationship_17_fk');
            $table->string('descripcioncalificacion', 180)->nullable();

            $table->unique(['idcalificacion'], 'calificacion_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificacion');
    }
}