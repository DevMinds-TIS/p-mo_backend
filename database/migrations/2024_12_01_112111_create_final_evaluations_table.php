<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_evaluations', function (Blueprint $table) {
            $table->increments('idfe')->unique('final_evaluations_pk');
            $table->integer('idcriteria')->nullable()->index('relationship_61_fk');
            $table->integer('iduser')->nullable()->index('relationship_62_fk');
            $table->integer('idteam')->nullable()->index('relationship_63_fk');
            $table->date('datefe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('final_evaluations');
    }
}
