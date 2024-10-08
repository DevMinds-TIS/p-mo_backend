<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            // $table->integer('idadmin')->primary();
            $table->increments('idadmin');
            $table->string('nameadmin', 60)->nullable();
            $table->string('lastnameadmin', 60)->nullable();
            $table->string('emailadmin', 120)->nullable();
            $table->string('passwdadmin', 255)->nullable();
            $table->string('profileadmin', 255)->nullable();
            $table->timestamps();

            // $table->unique(['idadmin'], 'admin_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
