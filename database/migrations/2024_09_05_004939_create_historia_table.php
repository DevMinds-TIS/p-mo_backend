<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia', function (Blueprint $table) {
            $table->integer('idhistoria')->unique('historia_pk');
            $table->integer('idsprint')->nullable()->index('relationship_8_fk');
            $table->string('nombrehistoria', 60)->nullable();
            $table->string('descripcionhistoria', 180)->nullable();
            $table->integer('puntoshistoria')->nullable();
            $table->string('mockuphistoria')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historia');
    }
}
