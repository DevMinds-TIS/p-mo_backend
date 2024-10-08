<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cross_evaluations', function (Blueprint $table) {
            $table->integer('idce')->unique('cross_evaluations_pk');
            $table->integer('idplanning')->nullable()->index('relationship_28_fk');
            $table->integer('idcriteria')->nullable()->index('relationship_29_fk2');
            $table->date('datece')->nullable();
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
        Schema::dropIfExists('cross_evaluations');
    }
}
