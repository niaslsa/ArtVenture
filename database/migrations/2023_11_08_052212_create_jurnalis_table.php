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
        Schema::create('jurnalis', function (Blueprint $table) {
            $table->integer('id_jurnalis',true);
            $table->integer('id_akun',false);
            $table->string('nama_jurnalis',25);
            $table->integer('kontak_jurnalis',false);
            $table->text('foto_jurnalis');

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
        Schema::dropIfExists('jurnalis');
    }
};
