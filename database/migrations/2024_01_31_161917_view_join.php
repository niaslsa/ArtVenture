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
        DB::unprepared("DROP VIEW IF EXISTS view_berita");
        DB::unprepared("
            CREATE VIEW view_berita AS
            SELECT
                b.id_berita AS id_berita,
                b.isi_berita AS isi_berita,
                b.nama_berita AS nama_berita,
                b.foto_berita AS foto_berita
            FROM berita b
        ");

        DB::unprepared("DROP VIEW IF EXISTS view_mitra");
        DB::unprepared("
        CREATE VIEW view_mitra AS
        SELECT
            m.id_mitra AS id_mitra,
            m.nama_mitra AS nama_mitra,
            m.foto_mitra AS foto_mitra,
            m.bisnis_mitra AS bisnis_mitra,
            m.kontak_mitra AS kontak_mitra
        FROM mitra m
    ");

    DB::unprepared("DROP VIEW IF EXISTS view_lahan");
        DB::unprepared("
            CREATE VIEW view_lahan AS
            SELECT
                id_lahan,
                nama_lahan,
                lokasi_lahan,
                penyewaan,
                foto_lahan
            FROM lahan
        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
