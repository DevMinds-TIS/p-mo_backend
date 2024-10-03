<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->bigIncrements('idestudiante'); // Esta línea ya define la clave primaria
            $table->integer('idactor')->nullable()->index('relationship_2_fk');
            $table->integer('idequipo')->nullable()->index('relationship_5_fk');
            $table->integer('idreceptor')->nullable()->index('relationship_22_fk');
            $table->integer('idemisor')->nullable()->index('relationship_25_fk');
            $table->integer('idgrupo')->nullable()->index('relationship_29_fk');
            $table->timestamps(); // Mueve esta línea al final
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante');
    }
}
