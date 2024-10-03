<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStoriesSpreadsheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stories_spreadsheet', function (Blueprint $table) {
            $table->integer('iduss')->primary();
            $table->integer('idsprint')->nullable()->index('relationship_10_fk');
            $table->integer('idstudent')->nullable()->index('relationship_14_fk');
            $table->string('codeuss', 10)->nullable();
            $table->string('nameuss', 120)->nullable();
            $table->string('statususs', 60)->nullable();
            $table->integer('pointstuss')->nullable();

            $table->unique(['iduss'], 'user_stories_spreadsheet_pk');
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
        Schema::dropIfExists('user_stories_spreadsheet');
    }
}
