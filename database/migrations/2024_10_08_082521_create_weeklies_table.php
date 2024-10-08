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
            // $table->integer('idweeklie')->unique('weeklies_pk');
            $table->increments('idweeklie');
            $table->integer('idsprint')->nullable()->index('relationship_21_fk');
            $table->string('goalweeklie', 90)->nullable();
            $table->date('startweeklie')->nullable();
            $table->date('endweeklie')->nullable();
            $table->string('statusweeklie', 90)->nullable();
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
