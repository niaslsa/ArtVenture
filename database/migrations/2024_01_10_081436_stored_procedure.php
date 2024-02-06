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
        DB::unprepared('DROP Procedure IF EXISTS CreateLahan');
        DB::unprepared("
        CREATE PROCEDURE CreateLahan(
            IN new_nama_lahan VARCHAR(50),
            IN new_lokasi_lahan VARCHAR(150),
            IN new_foto_lahan TEXT
        )
        BEGIN
            INSERT INTO lahan(nama_lahan, lokasi_lahan, foto_lahan)
            VALUES(new_nama_lahan, new_lokasi_lahan, new_foto_lahan);
    END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP Procedure IF EXISTS CreateLahan');
    }
};
