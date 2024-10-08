<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            // $table->integer('idtoken')->primary();
            $table->increments('idtoken');
            $table->integer('iduser')->nullable()->index('relationship_35_fk');
            $table->string('teachertoken', 255)->nullable();
            $table->timestamps();

            // $table->unique(['idtoken'], 'tokens_pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
