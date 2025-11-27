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
        Schema::table('pelanggan', function (Blueprint $table) {
            // Tambah kolom setelah jam_booking (opsional)
            $table->date('tanggal_selesai')->nullable()->after('jam_booking');
            $table->time('jam_selesai')->nullable()->after('tanggal_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->dropColumn('tanggal_selesai');
            $table->dropColumn('jam_selesai');
        });
    }
};
