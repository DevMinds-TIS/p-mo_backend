<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametro', function (Blueprint $table) {
            $table->integer('idparametro')->unique('parametro_pk');
            $table->integer('idevaluacion')->nullable()->index('relationship_15_fk');
            $table->string('nombreparametro', 60)->nullable();
            $table->string('descripcionparametro', 180)->nullable();
            $table->integer('puntajeparametro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametro');
    }
}