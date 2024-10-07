<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint', function (Blueprint $table) {
            // $table->integer('idsprint')->unique('sprint_pk');
            $table->increments('idsprint');
            $table->integer('idplanning')->nullable()->index('relationship_9_fk');
            $table->date('startsprint')->nullable();
            $table->date('endsprint')->nullable();
            $table->string('goalsprint', 255)->nullable();
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
        Schema::dropIfExists('sprint');
    }
}
