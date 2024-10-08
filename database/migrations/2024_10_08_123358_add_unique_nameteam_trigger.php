<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddUniqueNameteamTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('teams', function (Blueprint $table) {
        //     //
        // });

        DB::statement('
            CREATE OR REPLACE FUNCTION enforce_nameteam_unique() RETURNS TRIGGER AS $$
            BEGIN
                IF EXISTS (SELECT 1 FROM teams WHERE LOWER(NEW.nameteam) = LOWER(nameteam)) THEN
                    RAISE EXCEPTION \'Duplicate entry for nameteam\';
                END IF;
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ');

        DB::statement('
            CREATE TRIGGER unique_nameteam_trigger
            BEFORE INSERT OR UPDATE ON teams
            FOR EACH ROW
            EXECUTE FUNCTION enforce_nameteam_unique();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('teams', function (Blueprint $table) {
        //     //
        // });

        DB::statement('
            DROP TRIGGER IF EXISTS unique_nameteam_trigger ON teams;
        ');

        DB::statement('
            DROP FUNCTION IF EXISTS enforce_nameteam_unique;
        ');
    }
}
