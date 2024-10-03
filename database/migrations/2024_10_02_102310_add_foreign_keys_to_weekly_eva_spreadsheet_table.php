<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToWeeklyEvaSpreadsheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weekly_eva_spreadsheet', function (Blueprint $table) {
            $table->foreign(['idsprint'], 'fk_weekly_e_relations_sprint')->references(['idsprint'])->on('sprint')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weekly_eva_spreadsheet', function (Blueprint $table) {
            $table->dropForeign('fk_weekly_e_relations_sprint');
        });
    }
}
