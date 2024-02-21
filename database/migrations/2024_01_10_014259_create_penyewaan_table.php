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

            $table->integer('id_lahan')->nullable(true);
            $table->string('nama_lahan')->nullable(true);
            $table->text('lokasi_lahan')->nullable(true);
            $table->text('foto_lahan')->nullable(true);

            $table->integer('id_properti')->nullable(true);
            $table->string('nama_properti')->nullable(true);
            $table->string('kondisi_properti')->nullable(true);
            $table->text('foto_properti')->nullable(true);
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
