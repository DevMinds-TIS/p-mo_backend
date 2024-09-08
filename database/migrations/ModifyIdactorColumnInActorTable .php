<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyIdactorColumnInActorTable extends Migration
{
    public function up()
    {
        Schema::table('actor', function (Blueprint $table) {
            $table->bigIncrements('idactor')->change(); // Ajusta la columna para que sea auto-incremental
        });
    }

    public function down()
    {
        Schema::table('actor', function (Blueprint $table) {
            $table->bigInteger('idactor')->change(); // Revertir el cambio si es necesario
        });
    }
}