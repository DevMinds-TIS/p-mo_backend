<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space', function (Blueprint $table) {
            // $table->integer('idspace')->unique('space_pk');
            $table->increments('idspace');
            $table->integer('idproject')->nullable()->index('relationship_4_fk');
            $table->integer('idteacher')->nullable()->index('relationship_5_fk');
            $table->date('startspace')->nullable();
            $table->date('endspace')->nullable();
            $table->date('startregistrationspace')->nullable();
            $table->date('endregistrationspace')->nullable();
            $table->string('studentlistspace', 255)->nullable();
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
        Schema::dropIfExists('space');
    }
}
