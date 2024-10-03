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
            $table->integer('idadmin')->unique('admin_pk');
            $table->string('nameadmin', 60)->nullable();
            $table->string('lastnameadmin', 60)->nullable();
            $table->string('emailadmin', 120)->unique();
            $table->string('passwdadmin', 255)->nullable();
            $table->string('profileadmin', 255)->nullable();
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
        Schema::dropIfExists('admin');
    }
}
