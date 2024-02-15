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

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS mitra_update_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS berita_update_trigger');
    }
};
