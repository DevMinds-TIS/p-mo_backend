<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelfAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_assessment', function (Blueprint $table) {
            // $table->integer('idsa')->primary();
            $table->increments('idsa');
            $table->integer('idac')->nullable()->index('relationship_16_fk');
            $table->integer('idplanning')->nullable()->index('relationship_19_fk');
            $table->integer('idstudent')->nullable()->index('relationship_22_fk');
            $table->date('datesa')->nullable();
            $table->timestamps();

            // $table->unique(['idsa'], 'self_assessment_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('self_assessment');
    }
}