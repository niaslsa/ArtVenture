<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->integer('id_berita',true);
            // $table->integer('id_akun',false)->nullable(false);
            // $table->integer('id_jurnalis',false);
            $table->text('isi_berita',false);
            $table->string('nama_berita',250);
            $table->text('foto_berita');
            //Foreign Key

        // $table->foreign('id_akun')->on('akun')
        // ->references('id_akun')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
