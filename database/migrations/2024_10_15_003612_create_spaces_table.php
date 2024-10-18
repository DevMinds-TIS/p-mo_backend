<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->increments('idspace')->unique('spaces_pk');
            $table->integer('idproject')->nullable()->index('relationship_3_fk');
            $table->string('namespace', 60)->nullable();
            $table->date('startspace')->nullable();
            $table->date('endspace')->nullable();
            $table->date('starregistrationspace')->nullable();
            $table->date('endregistrationspace')->nullable();
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
        Schema::dropIfExists('spaces');
    }
}
