<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracking', function (Blueprint $table) {
            $table->foreign(['idsprint'], 'fk_tracking_relations_sprints')->references(['idsprint'])->on('sprints')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['iduser'], 'fk_tracking_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idstatus'], 'fk_tracking_relations_status')->references(['idstatus'])->on('status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracking', function (Blueprint $table) {
            $table->dropForeign('fk_tracking_relations_sprints');
            $table->dropForeign('fk_tracking_relations_users');
            $table->dropForeign('fk_tracking_relations_status');
        });
    }
}
