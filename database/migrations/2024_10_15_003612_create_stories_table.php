<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('idstorie')->unique('stories_pk');
            $table->integer('idweeklie')->nullable()->index('relationship_16_fk');
            $table->integer('iduser')->nullable()->index('relationship_17_fk');
            $table->string('codestorie', 10)->nullable();
            $table->string('namestorie', 60)->nullable();
            $table->string('statusstorie', 60)->nullable();
            $table->integer('pointstorie')->nullable();
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
        Schema::dropIfExists('stories');
    }
}
