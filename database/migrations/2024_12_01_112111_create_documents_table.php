<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('iddocument')->unique('documents_pk');
            $table->integer('idproject')->nullable()->index('relationship_11_fk');
            $table->integer('idspace')->nullable()->index('relationship_12_fk');
            $table->integer('idplanning')->nullable()->index('relationship_13_fk');
            $table->integer('idtracking')->nullable()->index('relationship_20_fk');
            $table->integer('idstorie')->nullable()->index('relationship_39_fk');
            $table->integer('idtask')->nullable()->index('relationship_40_fk');
            $table->integer('idteam')->nullable()->index('relationship_60_fk');
            $table->string('namedocument', 90)->nullable();
            $table->string('pathdocument', 255)->nullable();
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
        Schema::dropIfExists('documents');
    }
}
