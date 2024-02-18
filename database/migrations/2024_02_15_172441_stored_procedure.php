<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP Procedure IF EXISTS CreateStaffTiketing');
        DB::unprepared("
        CREATE PROCEDURE CreateStaffTiketing(
            IN new_id_akun INT(11),
            IN new_nama_st VARCHAR(20),
            IN new_kontak_st INT(11),
            IN new_foto_st TEXT
        )
        BEGIN
            INSERT INTO staff_tiketing(id_akun, nama_st, kontak_st, foto_st)
            VALUES(new_id_akun, new_nama_st, new_kontak_st, new_foto_st);
    END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP Procedure IF EXISTS CreateStaffTiketing');
    }
};
