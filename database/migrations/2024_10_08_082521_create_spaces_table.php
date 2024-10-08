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
            $table->integer('idspace')->primary();
            $table->integer('idproject')->nullable()->index('relationship_3_fk');
            $table->string('namespace', 60)->nullable();
            $table->date('startspace')->nullable();
            $table->date('endspace')->nullable();
            $table->date('starregistrationspace')->nullable();
            $table->date('endregistrationspace')->nullable();
            $table->timestamps();

            $table->unique(['idspace'], 'spaces_pk');
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
