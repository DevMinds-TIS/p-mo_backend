<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeerEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peer_evaluations', function (Blueprint $table) {
            $table->increments('idpe')->unique('peer_evaluations_pk');
            $table->integer('idcriteria')->nullable()->index('relationship_26_fk');
            $table->integer('iduser')->nullable()->index('relationship_27_fk');
            $table->date('datepe')->nullable();
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
        Schema::dropIfExists('peer_evaluations');
    }
}
