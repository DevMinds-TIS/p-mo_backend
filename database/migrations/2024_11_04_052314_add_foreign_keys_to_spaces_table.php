<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spaces', function (Blueprint $table) {
            $table->foreign(['idproject'], 'fk_spaces_relations_projects')->references(['idproject'])->on('projects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['iduser'], 'fk_spaces_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spaces', function (Blueprint $table) {
            $table->dropForeign('fk_spaces_relations_projects');
            $table->dropForeign('fk_spaces_relations_users');
        });
    }
}
