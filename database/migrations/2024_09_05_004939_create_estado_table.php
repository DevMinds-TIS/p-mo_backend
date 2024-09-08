<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado', function (Blueprint $table) {
            $table->integer('idestado')->primary();
            $table->integer('idhistoria')->nullable()->index('relationship_10_fk');
            $table->integer('idtarea')->nullable()->index('relationship_11_fk');
            $table->integer('idsprint')->nullable()->index('relationship_12_fk');
            $table->integer('idparametro')->nullable()->index('relationship_16_fk');
            $table->string('nombreestado', 60)->nullable();
            $table->string('descripcionestado', 180)->nullable();

            $table->unique(['idestado'], 'estado_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado');
    }
}