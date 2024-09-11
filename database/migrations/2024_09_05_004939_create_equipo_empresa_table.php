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
            $table->timestamps();
            $table->bigIncrements('idequipo')->unique('equipo_empresa_pk');
            $table->integer('idgestion')->nullable()->index('relationship_6_fk');
            $table->integer('idproyecto')->nullable()->index('relationship_7_fk');
            $table->integer('idcalificacion')->nullable()->index('relationship_18_fk');
            $table->integer('idreceptor')->nullable()->index('relationship_23_fk');
            $table->integer('idemisor')->nullable()->index('relationship_26_fk');
            $table->string('Nombredelequipo', 60)->nullable(); // Renombrado desde 'nombrecorto'
            $table->string('nombre_equipo_largo', 100)->nullable(); // Renombrado desde 'nombrelargo' y con tamaño mayor
            $table->string('correoequipo', 60)->nullable();
            $table->string('fotodelogoEquipo')->nullable(); // Renombrado desde 'logoequipo'
            $table->integer('miembro_1')->nullable()->index('miembro_1_fk'); // Nuevo campo para el primer miembro
            $table->integer('miembro_2')->nullable()->index('miembro_2_fk'); // Nuevo campo para el segundo miembro
            $table->integer('miembro_3')->nullable()->index('miembro_3_fk'); // Nuevo campo para el tercer miembro
            $table->integer('miembro_4')->nullable()->index('miembro_4_fk'); // Nuevo campo para el cuarto miembro
            $table->integer('miembro_5')->nullable()->index('miembro_5_fk'); // Nuevo campo para el quinto miembro
            $table->integer('miembro_6')->nullable()->index('miembro_6_fk'); // Nuevo campo para el sexto miembro
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