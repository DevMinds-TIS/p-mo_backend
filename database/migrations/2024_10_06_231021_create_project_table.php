<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            // $table->integer('idproject')->primary();
            $table->increments('idproject');
            $table->integer('idadmin')->nullable()->index('relationship_3_fk');
            $table->string('nameproject', 120)->nullable();
            $table->string('codeproject', 30)->nullable();
            $table->string('invitationproject', 255)->nullable();
            $table->string('specificationproject', 255)->nullable();
            $table->date('startproject')->nullable();
            $table->date('endproject')->nullable();
            $table->timestamps();

            // $table->unique(['idproject'], 'project_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
}
