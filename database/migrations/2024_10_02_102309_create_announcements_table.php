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
            $table->integer('ida')->unique('announcements_pk');
            $table->integer('idspace')->nullable()->index('relationship_29_fk');
            $table->integer('idproject')->nullable()->index('relationship_30_fk');
            $table->string('heada', 60)->nullable();
            $table->string('bodya', 255)->nullable();
            $table->string('scopea', 15)->nullable();
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
