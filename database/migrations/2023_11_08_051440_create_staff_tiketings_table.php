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
        Schema::create('staff_tiketing', function (Blueprint $table) {
            $table->integer('id_st');
            $table->integer('id_akun');
            $table->string('nama_st',20);
            $table->integer('kontak_st',14);
            $table->text('foto_st');

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
        Schema::dropIfExists('staff_tiketings');
    }
};
