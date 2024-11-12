<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->increments('idteammember')->unique('team_members_pk');
            $table->integer('idteam')->nullable()->index('relationship_5_fk');
            $table->integer('iduser')->nullable()->index('relationship_9_fk');
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
        Schema::dropIfExists('team_members');
    }
}
