<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('idann')->unique('announcements_pk');
            $table->integer('idproject')->nullable();
            $table->integer('idspace')->nullable();
            $table->integer('idstatus')->nullable()->index('relationship_52_fk');
            $table->string('titleann', 90)->nullable();
            $table->string('contentann', 255)->nullable();
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
        Schema::dropIfExists('announcements');
    }
}
