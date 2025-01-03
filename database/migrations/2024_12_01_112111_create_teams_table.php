<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('idteam')->unique('teams_pk');
            $table->integer('idspace')->nullable()->index('relationship_4_fk');
            $table->integer('iduser')->nullable()->index('relationship_42_fk');
            $table->string('nameteam', 60)->nullable();
            $table->string('companyteam', 10)->nullable();
            $table->string('emailteam', 120)->nullable();
            $table->string('logoteam', 255)->nullable();
            $table->string('repositoryteam', 255)->nullable();
            $table->string('localdeployteam', 255)->nullable();
            $table->string('externaldeployteam', 255)->nullable();
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
        Schema::dropIfExists('teams');
    }
}
