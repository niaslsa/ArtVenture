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
    public function up()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS CreateBerita');
        
        DB::unprepared('
            CREATE PROCEDURE CreateBerita(
                IN p_nama_berita VARCHAR(255),
                IN p_isi_berita TEXT,
                IN p_foto_berita VARCHAR(255)
            )
            BEGIN
                DECLARE pesan_error CHAR(5) DEFAULT "000";

                DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
                BEGIN
                    SET pesan_error = "001";
                END;

                START TRANSACTION; 

                INSERT INTO berita (nama_berita, isi_berita, foto_berita)
                VALUES (p_nama_berita, p_isi_berita, p_foto_berita);

                IF pesan_error = "000" THEN
                    COMMIT; 
                ELSE
                    ROLLBACK; 
                END IF;
            END
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS CreateMitra');

        DB::unprepared('
            CREATE PROCEDURE CreateMitra(
                IN new_nama_mitra VARCHAR(255),
                IN new_foto_mitra TEXT,
                IN new_bisnis_mitra VARCHAR(255),
                IN new_kontak_mitra INT(11)
            )
            BEGIN
                DECLARE pesan_error CHAR(5) DEFAULT "000";

                DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
                BEGIN
                    SET pesan_error = "001";
                END;

                START TRANSACTION;

                INSERT INTO mitra (nama_mitra, foto_mitra, bisnis_mitra, kontak_mitra)
                VALUES (new_nama_mitra, new_foto_mitra, new_bisnis_mitra, new_kontak_mitra);

                IF pesan_error = "000" THEN
                    COMMIT;
                ELSE
                    ROLLBACK;
                END IF;
            END
        ');
    }

    public function down()
    {

    }
};