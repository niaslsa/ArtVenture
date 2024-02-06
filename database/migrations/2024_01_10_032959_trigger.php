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
        DB::unprepared('
        CREATE TRIGGER add_penyewaan_lahan
        AFTER UPDATE ON lahan FOR EACH ROW
        BEGIN
            IF NEW.penyewaan = "Ya" THEN
                INSERT INTO penyewaan (id_lahan, nama_lahan, id_properti, nama_properti)
                VALUES (NEW.id_lahan, NEW.nama_lahan, 0, "-")
                ON DUPLICATE KEY UPDATE
                    id_lahan = NEW.id_lahan,
                    nama_lahan = NEW.nama_lahan,
                    id_properti = 0,
                    nama_properti = "-";
            END IF;
        END;
        ');

        DB::unprepared('
        CREATE TRIGGER add_penyewaan_properti
        AFTER UPDATE ON properti FOR EACH ROW
        BEGIN
            IF NEW.penyewaan = "Ya" THEN
                INSERT INTO penyewaan (id_lahan, nama_lahan, id_properti, nama_properti)
                VALUES (0, "-", NEW.id_properti, NEW.nama_properti)
                ON DUPLICATE KEY UPDATE
                    id_lahan = 0,
                    nama_lahan = "-",
                    id_properti = NEW.id_properti,
                    nama_properti = NEW.nama_properti;
            END IF;
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER add_penyewaan_lahan');
        DB::unprepared('DROP TRIGGER add_penyewaan_properti');
    }
};
