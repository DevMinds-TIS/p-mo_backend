<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente', function (Blueprint $table) {
            $table->integer('iddocente')->unique('docente_pk');
            $table->integer('idactor')->nullable()->index('relationship_1_fk');
            $table->integer('idgrupo')->nullable()->index('relationship_3_fk');
            $table->integer('idreceptor')->nullable()->index('relationship_21_fk');
            $table->integer('idemisor')->nullable()->index('relationship_24_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente');
    }
}
