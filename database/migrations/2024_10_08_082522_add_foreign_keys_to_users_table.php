<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['idrol'], 'fk_users_relations_roles')->references(['idrol'])->on('roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idtoken'], 'fk_users_relations_tokens')->references(['idtoken'])->on('tokens')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['use_iduser'], 'fk_users_relations_users')->references(['iduser'])->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idsiscode'], 'fk_users_relations_siscode')->references(['idsiscode'])->on('siscode')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_relations_roles');
            $table->dropForeign('fk_users_relations_tokens');
            $table->dropForeign('fk_users_relations_users');
            $table->dropForeign('fk_users_relations_siscode');
        });
    }
}