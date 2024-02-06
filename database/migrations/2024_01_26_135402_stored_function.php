<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS CountBerita');
        
        DB::unprepared('
            CREATE FUNCTION CountBerita() RETURNS INT
            BEGIN
                DECLARE beritaCount INT;
                SELECT COUNT(*) INTO beritaCount FROM berita;
                RETURN beritaCount;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountMitra');
        
        DB::unprepared('
            CREATE FUNCTION CountMitra() RETURNS INT
            BEGIN
                DECLARE mitraCount INT;
                SELECT COUNT(*) INTO mitraCount FROM mitra;
                RETURN mitraCount;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
