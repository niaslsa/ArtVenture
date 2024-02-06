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
        Schema::create('lahan', function (Blueprint $table) {
            $table->integer('id_lahan',true);
            // $table->integer('id_akun',false)->nullable(false);
            // $table->integer('id_mitra',false);
            // $table->integer('id_ss',false);
            $table->string('nama_lahan',25);
            $table->string('lokasi_lahan',255);
            $table->enum('penyewaan', ['Ya', 'Tidak'])->default('Tidak');
            $table->text('foto_lahan');

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
        Schema::dropIfExists('lahan');
    }
};
