<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_criteria', function (Blueprint $table) {
            // $table->integer('idac')->primary();
            $table->increments('idac');
            $table->string('nameac', 60)->nullable();
            $table->integer('scoreac')->nullable();
            $table->string('commetnac', 220)->nullable();
            $table->timestamps();

            // $table->unique(['idac'], 'assessment_criteria_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessment_criteria');
    }
}
