<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cross_assessment', function (Blueprint $table) {
            // $table->integer('idca')->unique('cross_assessment_pk');
            $table->increments('idca');
            $table->integer('idac')->nullable()->index('relationship_18_fk');
            $table->integer('idplanning')->nullable()->index('relationship_21_fk');
            $table->integer('idevaluation_team')->nullable()->index('relationship_24_fk');
            $table->integer('idevaluated_team')->nullable()->index('relationship_26_fk');
            $table->date('dateca')->nullable();
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
        Schema::dropIfExists('cross_assessment');
    }
}
