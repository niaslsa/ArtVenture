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

        // MITRA INSERT TRIGGER
        DB::unprepared('
            CREATE TRIGGER mitra_insert_trigger
            AFTER INSERT ON mitra
            FOR EACH ROW
            BEGIN
                DECLARE log_message VARCHAR(255);
                
                SET log_message = CONCAT("Mitra dengan ID ", NEW.id_mitra, " telah ditambahkan dengan nama: ", NEW.nama_mitra, ".");

                INSERT INTO logs (logs) VALUES (log_message);
            END
        ');

        // BERITA INSERT TRIGGER
        DB::unprepared('
            CREATE TRIGGER berita_insert_trigger
            AFTER INSERT ON berita
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (logs) VALUES (
                    CONCAT("Berita dengan ID ", NEW.id_berita, " telah ditambahkan.")
                );
            END
        ');

        // STAFF TICKETING INSERT TRIGGER
        DB::unprepared('
            CREATE TRIGGER staff_tiketing_insert_trigger
            AFTER INSERT ON staff_tiketing
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (logs) VALUES (
                    CONCAT("Staff Tiketing dengan ID ", NEW.id_st, " telah ditambahkan dengan nama: ", NEW.nama_st, ".")
                );
            END
        ');

        // Lahan INSERT TRIGGER
        DB::unprepared('
            CREATE TRIGGER lahan_insert_trigger
            AFTER INSERT ON lahan
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (logs) VALUES (
                    CONCAT("Lahan dengan ID ", NEW.id_lahan, " telah ditambahkan.")
                );
            END
        ');

        // Properti INSERT TRIGGER
        DB::unprepared('
            CREATE TRIGGER properti_insert_trigger
            AFTER INSERT ON properti
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (logs) VALUES (
                    CONCAT("Properti dengan ID ", NEW.id_properti, " telah ditambahkan.")
                );
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS mitra_insert_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS berita_insert_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS staff_tiketing_insert_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS lahan_insert_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS properti_insert_trigger');
    }
};
