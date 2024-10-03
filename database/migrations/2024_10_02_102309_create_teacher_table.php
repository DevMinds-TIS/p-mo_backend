<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->integer('idteacher')->unique('teacher_pk');
            $table->integer('idadmin')->nullable()->index('relationship_1_fk');
            $table->string('nameteacher', 60)->nullable();
            $table->string('lastnameteacher', 60)->nullable();
            $table->string('emailteacher', 120)->nullable();
            $table->string('passwdteacher', 255)->nullable();
            $table->string('profileteacher', 255)->nullable();
            $table->string('tokenteacher', 255)->nullable();
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
        Schema::dropIfExists('teacher');
    }
}
