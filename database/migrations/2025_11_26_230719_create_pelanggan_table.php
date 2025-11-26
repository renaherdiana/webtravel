<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();

            // DATA DASAR PELANGGAN
            $table->string('nama');
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();

            // (OPSIONAL) DATA MOBIL - kalau pakai service mobil
            $table->string('merk_mobil')->nullable();
            $table->string('tipe_mobil')->nullable();

            // JADWAL BOOKING
            $table->date('tanggal_booking')->nullable();
            $table->time('jam_booking')->nullable();

            // STATUS BOOKING
           $table->enum('status', ['pending', 'ongoing', 'completed', 'cancelled'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
