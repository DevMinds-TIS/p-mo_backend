<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintTrackingSpreadsheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_tracking_spreadsheet', function (Blueprint $table) {
            $table->integer('idsts')->primary();
            $table->integer('idsprint')->nullable()->index('relationship_11_fk');
            $table->string('documentsts', 255)->nullable();
            $table->date('deliverysts')->nullable();
            $table->date('returnsts')->nullable();
            $table->string('statussts', 60)->nullable();
            $table->string('commetsts', 120)->nullable();

            $table->unique(['idsts'], 'sprint_tracking_spreadsheet_pk');
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
        Schema::dropIfExists('sprint_tracking_spreadsheet');
    }
}
