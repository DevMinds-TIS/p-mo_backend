<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveIdreceptorIdemisorFromDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docente', function (Blueprint $table) {
            // Eliminar las columnas idreceptor e idemisor
            $table->dropColumn(['idreceptor', 'idemisor', 'idgrupo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docente', function (Blueprint $table) {
            // Volver a agregar las columnas en caso de rollback
            $table->integer('idreceptor')->nullable()->index('relationship_21_fk');
            $table->integer('idemisor')->nullable()->index('relationship_24_fk');
            $table->integer('idgrupo')->nullable()->index('relationship_3_fk');
        });
    }
}
