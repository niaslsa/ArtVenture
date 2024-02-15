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
        Schema::create('staff_sarana', function (Blueprint $table) {
            $table->integer('id_ss',true);
            $table->integer('id_akun',false);
            $table->string('nama_ss',25);
            $table->integer('kontak_ss',false);
            $table->text('foto_ss');
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
        Schema::dropIfExists('staff_sarana');
    }
};
