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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable(); // untuk menyimpan nama file
            $table->string('merk_mobil'); // contoh: Toyota, Daihatsu
            $table->string('nama_mobil'); // contoh: Avanza, Calya
            $table->string('tahun_pembuatan'); // contoh: 2020, 2022
            $table->integer('harga_sewa'); // contoh: 200000
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
