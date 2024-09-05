<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_empresa', function (Blueprint $table) {
            $table->integer('idequipo')->unique('equipo_empresa_pk');
            $table->integer('idgestion')->nullable()->index('relationship_6_fk');
            $table->integer('idproyecto')->nullable()->index('relationship_7_fk');
            $table->integer('idcalificacion')->nullable()->index('relationship_18_fk');
            $table->integer('idreceptor')->nullable()->index('relationship_23_fk');
            $table->integer('idemisor')->nullable()->index('relationship_26_fk');
            $table->string('nombrecorto', 60)->nullable();
            $table->string('nombrelargo', 60)->nullable();
            $table->string('correoequipo', 60)->nullable();
            $table->string('logoequipo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_empresa');
    }
}
