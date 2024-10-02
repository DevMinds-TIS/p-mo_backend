<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('documentos', function (Blueprint $table) {
            $table->idtarea();
            $table->foreignId('sprint_id')->constrained()->onDelete('cascade');
            $table->string('nombredocumento');
            $table->string('rutadocumento');
            $table->enum('estado', ['Uploaded', 'Reviewed']);
            $table->date('uploaded_at');
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
        Schema::dropIfExists('documento');
    }
}
