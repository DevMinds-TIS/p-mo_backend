<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria', function (Blueprint $table) {
            // $table->integer('idcriteria')->primary();
            $table->increments('idcriteria');
            $table->string('namecriteria', 90)->nullable();
            $table->integer('scorecriteria')->nullable();
            $table->string('commentcriteria', 180)->nullable();
            $table->timestamps();

            // $table->unique(['idcriteria'], 'criteria_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteria');
    }
}
