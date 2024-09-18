<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyClaveactorColumnInActorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actor', function (Blueprint $table) {
            // Modifica la longitud de claveactor a 60 caracteres
            $table->string('claveactor', 60)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actor', function (Blueprint $table) {
            // Revertir la longitud de claveactor a 20 caracteres si es necesario
            $table->string('claveactor', 20)->change();
        });
    }
}
