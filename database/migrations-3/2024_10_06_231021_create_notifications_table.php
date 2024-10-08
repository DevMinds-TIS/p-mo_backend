<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            // $table->integer('idn')->primary();
            $table->increments('idn');
            $table->integer('idstudent')->nullable()->index('relationship_27_fk');
            $table->integer('idteacher')->nullable()->index('relationship_28_fk');
            $table->string('headn', 60)->nullable();
            $table->string('bodyn', 255)->nullable();
            $table->timestamps();

            // $table->unique(['idn'], 'notifications_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
