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
        Schema::create('wisatawan', function (Blueprint $table) {
            $table->integer('id_wisatawan',true);
            $table->string('nama_wisatawan',15);
            $table->integer('kontak_wisatawan',false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatawans');
    }
};
