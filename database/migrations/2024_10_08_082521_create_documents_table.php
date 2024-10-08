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
            // $table->integer('iddocument')->primary();
            $table->increments('iddocument');
            $table->integer('idproject')->nullable()->index('relationship_11_fk');
            $table->integer('idspace')->nullable()->index('relationship_12_fk');
            $table->integer('idplanning')->nullable()->index('relationship_13_fk');
            $table->integer('idtracking')->nullable()->index('relationship_20_fk');
            $table->string('pathdocument', 255)->nullable();
            $table->timestamps();

            // $table->unique(['iddocument'], 'documents_pk');
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
