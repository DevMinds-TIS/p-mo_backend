<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeerToPeerEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peer_to_peer_evaluation', function (Blueprint $table) {
            $table->integer('idp2p')->primary();
            $table->integer('idac')->nullable()->index('relationship_17_fk');
            $table->integer('idsprint')->nullable()->index('relationship_20_fk');
            $table->integer('idstudent_evaluator')->nullable()->index('relationship_23_fk');
            $table->integer('idstudent_evaluated')->nullable()->index('relationship_25_fk');
            $table->date('datep2p')->nullable();

            $table->unique(['idp2p'], 'peer_to_peer_evaluation_pk');
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
        Schema::dropIfExists('peer_to_peer_evaluation');
    }
}
