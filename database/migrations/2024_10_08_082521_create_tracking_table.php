<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking', function (Blueprint $table) {
            $table->integer('idtracking')->unique('tracking_pk');
            $table->integer('idsprint')->nullable()->index('relationship_18_fk');
            $table->integer('iduser')->nullable()->index('relationship_19_fk');
            $table->string('nametracking', 90)->nullable();
            $table->date('deliverytracking')->nullable();
            $table->date('returntracking')->nullable();
            $table->string('statustracking', 90)->nullable();
            $table->string('commenttracking', 180)->nullable();
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
        Schema::dropIfExists('tracking');
    }
}
