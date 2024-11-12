<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSiscodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siscode', function (Blueprint $table) {
            $table->foreign(['iduser'], 'fk_siscode_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idspace'], 'fk_siscode_relations_spaces')->references(['idspace'])->on('spaces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siscode', function (Blueprint $table) {
            $table->dropForeign('fk_siscode_relations_users');
            $table->dropForeign('fk_siscode_relations_spaces');
        });
    }
}
