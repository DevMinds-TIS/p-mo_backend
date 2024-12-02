<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPeerEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peer_evaluations', function (Blueprint $table) {
            $table->foreign(['idcriteria'], 'fk_peer_eva_relations_criteria')->references(['idcriteria'])->on('criteria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['iduser'], 'fk_peer_eva_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peer_evaluations', function (Blueprint $table) {
            $table->dropForeign('fk_peer_eva_relations_criteria');
            $table->dropForeign('fk_peer_eva_relations_users');
        });
    }
}
