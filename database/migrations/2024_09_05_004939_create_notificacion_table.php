<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacion', function (Blueprint $table) {
            $table->integer('idnotificacion')->primary();
            $table->integer('idreceptor')->nullable()->index('relationship_19_fk');
            $table->integer('idemisor')->nullable()->index('relationship_20_fk');
            $table->string('nombrenotificacion', 60)->nullable();
            $table->string('descripcionnotificacion', 180)->nullable();

            $table->unique(['idnotificacion'], 'notificacion_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificacion');
    }
}