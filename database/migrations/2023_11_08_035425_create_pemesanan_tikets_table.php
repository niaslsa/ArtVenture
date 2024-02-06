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
        Schema::create('pemesanan_tiket', function (Blueprint $table) {
            $table->integer('id_pemesanan', true);
            $table->integer('id_akun',false)->nullable(false);
            $table->integer('id_st',false);  
            $table->date('tanggal_pemesanan');
            $table->integer('jumlah_pemesanan',false);
            $table->char('detail_pemesanan',50);

            //Foreign Key

            $table->foreign('id_akun')->on('akun')
                ->references('id_akun')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_tiket');
    }
};
