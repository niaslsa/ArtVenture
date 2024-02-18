<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPenyewaan');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalWisatawan');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalLogs');

        DB::unprepared('
        CREATE FUNCTION CountTotalPenyewaan() RETURNS INT
        BEGIN
            DECLARE penyewaanCount INT;
            SELECT COUNT(*)INTO penyewaanCount FROM penyewaan;
            RETURN penyewaanCount;
            END
            ');

        DB::unprepared('
        CREATE FUNCTION CountTotalWisatawan() RETURNS INT
        BEGIN
            DECLARE wisatawanCount INT;
            SELECT COUNT(*)INTO wisatawanCount FROM wisatawan;
            RETURN wisatawanCount;
            END
            ');

        DB::unprepared('
        CREATE FUNCTION CountTotalLogs() RETURNS INT
        BEGIN
            DECLARE logsCount INT;
            SELECT COUNT(*)INTO logsCount FROM logs;
            RETURN logsCount;
            END
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPenyewaan');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalWisatawan');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalLogs');
    }
};
