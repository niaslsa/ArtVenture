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
        Schema::create('mitra', function (Blueprint $table) {
            $table->integer('id_mitra',true);
            $table->string('nama_mitra');
            $table->text('foto_mitra');
            $table->string('bisnis_mitra',50);
            $table->integer('kontak_mitra',false);
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
