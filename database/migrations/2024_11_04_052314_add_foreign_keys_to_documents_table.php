<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->foreign(['idproject'], 'fk_document_relations_projects')->references(['idproject'])->on('projects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idspace'], 'fk_document_relations_spaces')->references(['idspace'])->on('spaces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idplanning'], 'fk_document_relations_planning')->references(['idplanning'])->on('planning')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idtracking'], 'fk_document_relations_tracking')->references(['idtracking'])->on('tracking')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idstorie'], 'fk_document_relations_stories')->references(['idstorie'])->on('stories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['idtask'], 'fk_document_relations_tasks')->references(['idtask'])->on('tasks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign('fk_document_relations_projects');
            $table->dropForeign('fk_document_relations_spaces');
            $table->dropForeign('fk_document_relations_planning');
            $table->dropForeign('fk_document_relations_tracking');
            $table->dropForeign('fk_document_relations_stories');
            $table->dropForeign('fk_document_relations_tasks');
        });
    }
}
