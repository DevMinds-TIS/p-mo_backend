<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning', function (Blueprint $table) {
            // $table->integer('idplanning')->unique('planning_pk');
            $table->increments('idplanning');
            $table->integer('idteam')->nullable()->index('relationship_31_fk');
            $table->string('partaplanning', 255)->nullable();
            $table->string('partbplanning', 255)->nullable();
            $table->string('contractplanning', 255)->nullable();
            $table->string('paymentplanning', 255)->nullable();
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
        Schema::dropIfExists('planning');
    }
}