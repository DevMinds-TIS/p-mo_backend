<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('idproject')->unique('projects_pk');
            $table->integer('iduser')->nullable()->index('relationship_2_fk');
            $table->string('nameproject', 120)->nullable();
            $table->string('codeproject', 30)->nullable();
            $table->string('termproject', 20)->nullable();
            $table->date('startproject')->nullable();
            $table->date('endproject')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
