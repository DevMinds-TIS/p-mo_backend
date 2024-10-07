<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            // $table->integer('idstudent')->unique('student_pk');
            $table->increments('idstudent');
            $table->integer('idteacher')->nullable()->index('relationship_2_fk');
            $table->integer('idteam')->nullable()->index('relationship_7_fk');
            $table->string('codesisstudent', 20)->nullable();
            $table->string('namestudent', 60)->nullable();
            $table->string('lastnamestudent', 60)->nullable();
            $table->string('emailstudent', 120)->nullable();
            $table->string('passwdstudent', 255)->nullable();
            $table->string('profilestudent', 255)->nullable();
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
        Schema::dropIfExists('student');
    }
}
