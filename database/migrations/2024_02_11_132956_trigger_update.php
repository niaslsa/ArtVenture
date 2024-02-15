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
        // MITRA UPDATE TRIGGER
        DB::unprepared('
            CREATE TRIGGER mitra_update_trigger
            AFTER UPDATE ON mitra
            FOR EACH ROW
            BEGIN
                DECLARE mitra_id INT;
                DECLARE perubahan VARCHAR(255);
                DECLARE update_message TEXT;

                SELECT id_mitra INTO mitra_id FROM mitra WHERE id_mitra = NEW.id_mitra;

                SET update_message = CONCAT("Mitra dengan nomor ID: ", mitra_id, " telah diupdate. Perubahan:");

                IF OLD.nama_mitra != NEW.nama_mitra THEN
                    SET perubahan = CONCAT("Nama Mitra dari ", OLD.nama_mitra, " ke ", NEW.nama_mitra);
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                IF OLD.foto_mitra != NEW.foto_mitra THEN
                    SET perubahan = "Foto Mitra diupdate";
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                IF OLD.bisnis_mitra != NEW.bisnis_mitra THEN
                    SET perubahan = CONCAT("Bisnis Mitra dari ", OLD.bisnis_mitra, " ke ", NEW.bisnis_mitra);
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                IF OLD.kontak_mitra != NEW.kontak_mitra THEN
                    SET perubahan = CONCAT("Kontak Mitra dari ", OLD.kontak_mitra, " ke ", NEW.kontak_mitra);
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                INSERT INTO logs (logs) VALUES (update_message);
            END
        ');

        // BERITA UPDATE TRIGGER
        DB::unprepared('
            CREATE TRIGGER berita_update_trigger
            AFTER UPDATE ON berita
            FOR EACH ROW
            BEGIN
                DECLARE berita_id INT;
                DECLARE perubahan VARCHAR(255);
                DECLARE update_message TEXT;

                SELECT id_berita INTO berita_id FROM berita WHERE id_berita = NEW.id_berita;

                SET update_message = CONCAT("Berita dengan nomor ID: ", berita_id, " telah diupdate. Perubahan:");

                IF OLD.isi_berita != NEW.isi_berita THEN
                    SET perubahan = CONCAT("Isi Berita dari ", OLD.isi_berita, " ke ", NEW.isi_berita);
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                IF OLD.nama_berita != NEW.nama_berita THEN
                    SET perubahan = CONCAT("Nama Berita dari ", OLD.nama_berita, " ke ", NEW.nama_berita);
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                IF OLD.foto_berita != NEW.foto_berita THEN
                    SET perubahan = CONCAT("Foto Berita dari ", OLD.foto_berita, " ke ", NEW.foto_berita);
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                INSERT INTO logs (logs) VALUES (update_message);
            END
        ');

        // STAFF TIKETING UPDATE TRIGGER
        DB::unprepared('
            CREATE TRIGGER staff_tiketing_update_trigger
            AFTER UPDATE ON staff_tiketing
            FOR EACH ROW
            BEGIN
                DECLARE st_id INT;
                DECLARE perubahan VARCHAR(255);
                DECLARE update_message TEXT;

                SELECT id_st INTO st_id FROM staff_tiketing WHERE id_st = NEW.id_st;

                SET update_message = CONCAT("Staff Tiketing dengan nomor ID: ", st_id, " telah diupdate. Perubahan:");

                IF OLD.id_akun != NEW.id_akun THEN
                    SET perubahan = CONCAT("ID Akun dari ", OLD.id_akun, " ke ", NEW.id_akun);
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                IF OLD.nama_st != NEW.nama_st THEN
                    SET perubahan = CONCAT("Nama Staff Tiketing dari ", OLD.nama_st, " ke ", NEW.nama_st);
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                IF OLD.kontak_st  != NEW.kontak_st  THEN
                    SET perubahan = CONCAT("Kontak Staff Tiketing dari ", OLD.kontak_st , " ke ", NEW.kontak_st );
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                IF OLD.foto_st 	 != NEW.foto_st 	 THEN
                    SET perubahan = CONCAT("Foto Staff Tiketing dari ", OLD.foto_st 	, " ke ", NEW.foto_st 	);
                    SET update_message = CONCAT(update_message, " ", perubahan);
                END IF;

                INSERT INTO logs (logs) VALUES (update_message);
            END
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS mitra_update_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS berita_update_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS staff_tiketing_update_trigger');
    }
};
