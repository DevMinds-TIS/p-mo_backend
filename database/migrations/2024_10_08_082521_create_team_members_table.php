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
            $table->integer('idteammember')->primary();
            $table->integer('idteam')->nullable()->index('relationship_5_fk');
            $table->integer('idrol')->nullable()->index('relationship_8_fk');
            $table->integer('iduser')->nullable()->index('relationship_9_fk');
            $table->timestamps();

            $table->unique(['idteammember'], 'team_members_pk');
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
