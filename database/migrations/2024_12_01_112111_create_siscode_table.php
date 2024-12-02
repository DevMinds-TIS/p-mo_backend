<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiscodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siscode', function (Blueprint $table) {
            $table->increments('idsiscode')->unique('siscode_pk');
            $table->integer('idspace')->nullable()->index('relationship_6_fk');
            $table->integer('iduser')->nullable()->index('relationship_34_fk');
            $table->string('siscode', 60)->nullable();
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
        Schema::dropIfExists('siscode');
    }
}
