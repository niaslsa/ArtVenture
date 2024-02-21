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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->integer('id_penyewaan', true);

            $table->integer('id_lahan');
            $table->string('nama_lahan');
            $table->text('lokasi_lahan');
            $table->text('foto_lahan');

            $table->integer('id_properti');
            $table->string('nama_properti');
            $table->enum('kondisi_properti',['Baik','Buruk']);
            $table->text('foto_properti');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaans');
    }
};
