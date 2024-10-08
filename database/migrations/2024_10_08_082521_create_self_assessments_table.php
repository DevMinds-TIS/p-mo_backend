<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelfAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_assessments', function (Blueprint $table) {
            // $table->integer('idsa')->unique('self_assessments_pk');
            $table->increments('idsa');
            $table->integer('idcriteria')->nullable()->index('relationship_24_fk');
            $table->integer('iduser')->nullable()->index('relationship_25_fk');
            $table->date('datesa')->nullable();
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
        Schema::dropIfExists('self_assessments');
    }
}
