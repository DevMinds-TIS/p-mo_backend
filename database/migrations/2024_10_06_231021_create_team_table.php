<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            // $table->integer('idteam')->unique('team_pk');
            $table->increments('idteam');
            $table->integer('idspace')->nullable()->index('relationship_6_fk');
            $table->integer('idplanning')->nullable()->index('relationship_8_fk');
            $table->string('nameteam', 60)->nullable();
            $table->string('companyteam', 10)->nullable();
            $table->string('emailteam', 120)->nullable();
            $table->string('profileteam', 255)->nullable();
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
        Schema::dropIfExists('team');
    }
}
