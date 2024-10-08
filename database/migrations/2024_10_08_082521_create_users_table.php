<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->integer('iduser')->primary();
            $table->increments('iduser');
            $table->integer('idrol')->nullable()->index('relationship_1_fk');
            $table->integer('idsiscode')->nullable()->index('relationship_7_fk');
            $table->integer('idtoken')->nullable()->index('relationship_10_fk');
            $table->integer('use_iduser')->nullable()->index('relationship_34_fk2');
            $table->string('nameuser', 60)->nullable();
            $table->string('lastnameuser', 60)->nullable();
            $table->string('emailuser', 120)->nullable();
            $table->string('passworduser', 255)->nullable();
            $table->string('profileuser', 255)->nullable();
            $table->timestamps();

            // $table->unique(['iduser'], 'users_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
