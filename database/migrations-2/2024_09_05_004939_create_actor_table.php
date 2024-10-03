<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor', function (Blueprint $table) {
            $table->timestamps();
            $table->bigIncrements('idactor')->unique('actor_pk');
            $table->string('nombreactor', 60)->nullable();
            $table->string('apellidoactor', 60)->nullable();
            $table->string('correoactor', 60)->nullable();
            $table->string('claveactor', 20)->nullable();
            $table->string('fotoperfilactor')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('actor');
    }


}