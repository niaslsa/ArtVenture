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
        // MITRA DELETE TRIGGER
        DB::unprepared('
            CREATE TRIGGER mitra_delete_trigger
            AFTER DELETE ON mitra
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (logs) VALUES (CONCAT("Mitra dengan ID: ", OLD.id_mitra, " telah dihapus."));
            END
        ');

        DB::unprepared('
            CREATE TRIGGER berita_delete_trigger
            AFTER DELETE ON berita
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (logs) VALUES (CONCAT("Berita dengan ID: ", OLD.id_berita, " telah dihapus."));
            END
        ');

        DB::unprepared('
            CREATE TRIGGER staff_tiketing_delete_trigger
            AFTER DELETE ON staff_tiketing
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (logs) VALUES (CONCAT("Staff Tiketing dengan ID: ", OLD.id_st, " telah dihapus."));
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS mitra_delete_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS berita_delete_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS staff_tiketing_delete_trigger');
    }
};