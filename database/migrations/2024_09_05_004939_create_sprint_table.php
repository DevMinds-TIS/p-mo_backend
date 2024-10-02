<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint', function (Blueprint $table) {
            $table->integer('idsprint')->unique('sprint_pk');
            $table->integer('idequipo')->nullable()->index('relationship_13_fk');
            $table->foreignId('idproyecto')->constrained('Proyecto')->onDelete('cascade');
            $table->string('nombre'); // Nombre del Sprint
            $table->text('descripcion')->nullable(); // Descripción del Sprint
            $table->date('fechainiciosprint')->nullable();
            $table->date('fechafinsprint')->nullable();
            $table->timestamps();  // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sprint');
    }
}