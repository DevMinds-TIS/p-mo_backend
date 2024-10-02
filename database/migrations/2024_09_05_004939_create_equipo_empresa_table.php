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
            $table->bigIncrements('idequipo')->unique('equipo_empresa_pk'); // ID único del equipo
            $table->integer('idgestion')->nullable()->index('relationship_6_fk'); // Gestión relacionada
            $table->integer('idproyecto')->nullable()->index('relationship_7_fk'); // Proyecto relacionado
            $table->integer('idcalificacion')->nullable()->index('relationship_18_fk'); // Calificación relacionada
            $table->integer('idreceptor')->nullable()->index('relationship_23_fk'); // Receptor de algo
            $table->integer('idemisor')->nullable()->index('relationship_26_fk'); // Emisor de algo
            $table->string('Nombredelequipo', 60)->nullable(); // Nombre corto del equipo
            $table->string('nombre_equipo_largo', 100)->nullable(); // Nombre largo del equipo
            $table->string('correoequipo', 60)->nullable(); // Correo del equipo
            $table->string('fotodelogoEquipo')->nullable(); // Logo del equipo
            $table->timestamps(); // Fechas de creación y modificación
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