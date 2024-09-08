<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoevaluacion', function (Blueprint $table) {
            $table->integer('idtipo')->unique('tipoevaluacion_pk');
            $table->integer('idevaluacion')->nullable()->index('relationship_14_fk');
            $table->string('nombretipo', 60)->nullable();
            $table->string('descripciontipo', 180)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoevaluacion');
    }
}