<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyEvaSpreadsheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_eva_spreadsheet', function (Blueprint $table) {
            $table->integer('idwes')->primary();
            $table->integer('idsprint')->nullable()->index('relationship_12_fk');
            $table->string('goalwes', 120)->nullable();
            $table->date('startwes')->nullable();
            $table->date('endwes')->nullable();
            $table->string('statuswes', 60)->nullable();

            $table->unique(['idwes'], 'weekly_eva_spreadsheet_pk');
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
        Schema::dropIfExists('weekly_eva_spreadsheet');
    }
}
