<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeklies', function (Blueprint $table) {
            $table->increments('idweeklie')->unique('weeklies_pk');
            $table->integer('idsprint')->nullable()->index('relationship_21_fk');
            $table->integer('idstatus')->nullable()->index('relationship_46_fk');
            $table->string('goalweeklie', 90)->nullable();
            $table->date('startweeklie')->nullable();
            $table->date('endweeklie')->nullable();
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
        Schema::dropIfExists('weeklies');
    }
}
