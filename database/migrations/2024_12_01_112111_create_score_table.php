<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score', function (Blueprint $table) {
            $table->increments('idscore')->unique('score_pk');
            $table->integer('idtask')->nullable()->index('relationship_45_fk');
            $table->integer('idce')->nullable()->index('relationship_49_fk');
            $table->integer('idsa')->nullable()->index('relationship_50_fk');
            $table->integer('idpe')->nullable()->index('relationship_51_fk');
            $table->integer('idteam')->nullable()->index('relationship_54_fk');
            $table->integer('iduser')->nullable()->index('relationship_55_fk');
            $table->integer('idsprint')->nullable()->index('relationship_56_fk');
            $table->integer('idtracking')->nullable()->index('relationship_57_fk');
            $table->integer('idweeklie')->nullable()->index('relationship_58_fk');
            $table->integer('pointscore')->nullable();
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
        Schema::dropIfExists('score');
    }
}
