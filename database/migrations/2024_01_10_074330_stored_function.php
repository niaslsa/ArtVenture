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
        DB::unprepared('DROP FUNCTION IF EXISTS CountPenyewaan');

        DB::unprepared('
        CREATE FUNCTION CountTotalPenyewaan() RETURNS INT
        BEGIN
            DECLARE penyewaanCount INT;
            SELECT COUNT(*)INTO penyewaanCount FROM penyewaan;
            RETURN penyewaanCount;
            END
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPenyewaan');
    }
};
