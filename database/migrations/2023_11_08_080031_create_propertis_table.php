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
        Schema::create('properti', function (Blueprint $table) {
            $table->integer('id_properti',true);
            $table->string('nama_properti',50);
            $table->enum('kondisi_properti',['Baik','Buruk']);
            $table->enum('penyewaan', ['Ya', 'Tidak'])->default('Tidak');
            $table->text('foto_properti');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properti');
    }
};
