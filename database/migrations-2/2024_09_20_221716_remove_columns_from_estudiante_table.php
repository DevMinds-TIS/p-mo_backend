<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiante', function (Blueprint $table) {
            $table->dropColumn(['idemisor', 'idreceptor', 'idgrupo', 'idequipo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudiante', function (Blueprint $table) {
            // Agregar nuevamente las columnas si es necesario
            $table->integer('idemisor')->nullable()->index('relationship_25_fk');
            $table->integer('idreceptor')->nullable()->index('relationship_22_fk');
            $table->integer('idgrupo')->nullable()->index('relationship_29_fk');
            $table->integer('idequipo')->nullable()->index('relationship_5_fk');
        });
    }
}
