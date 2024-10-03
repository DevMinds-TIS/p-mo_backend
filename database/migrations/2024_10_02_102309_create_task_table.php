<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->integer('idtask')->unique('task_pk');
            $table->integer('idwes')->nullable()->index('relationship_13_fk');
            $table->integer('idstudent')->nullable()->index('relationship_15_fk');
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
        Schema::dropIfExists('task');
    }
}
