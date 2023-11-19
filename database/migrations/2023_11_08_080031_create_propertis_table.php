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
            $table->integer('id_akun',false);
            $table->integer('id_ss', false);
            $table->integer('id_wisatawan', false);
            $table->integer('id_penyewaan', false);
            $table->string('nama_properti',50);
            $table->enum('kondisi_properti',['Baik','Buruk']);


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
        Schema::dropIfExists('propertis');
    }
};
