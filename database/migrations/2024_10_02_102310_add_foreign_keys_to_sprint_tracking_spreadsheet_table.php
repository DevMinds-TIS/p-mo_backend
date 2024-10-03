<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSprintTrackingSpreadsheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sprint_tracking_spreadsheet', function (Blueprint $table) {
            $table->foreign(['idsprint'], 'fk_sprint_t_relations_sprint')->references(['idsprint'])->on('sprint')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sprint_tracking_spreadsheet', function (Blueprint $table) {
            $table->dropForeign('fk_sprint_t_relations_sprint');
        });
    }
}
