<?php

use Illuminate\Support\Facades\DB;
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

    DB::unprepared("DROP VIEW IF EXISTS view_staff_tiketing");
        DB::unprepared("
            CREATE VIEW view_staff_tiketing AS
            SELECT
                s.id_st AS id_st,
                s.id_akun AS id_akun,
                s.nama_st AS nama_st,
                s.kontak_st AS kontak_st,
                s.foto_st AS foto_st,
                a.username AS username_akun 
            FROM staff_tiketing s
            JOIN akun a ON a.id_akun = s.id_akun
        ");


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
