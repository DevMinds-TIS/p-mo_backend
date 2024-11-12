<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('idtask')->unique('tasks_pk');
            $table->integer('idstorie')->nullable()->index('relationship_22_fk');
            $table->integer('iduser')->nullable()->index('relationship_23_fk');
            $table->string('nametask', 60)->nullable();
            $table->date('starttask')->nullable();
            $table->date('endtask')->nullable();
            $table->string('statustask', 60)->nullable();
            $table->integer('scoretask')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
