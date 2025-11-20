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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();

            // Kolom yang dipakai di halaman index
            $table->string('title');              // Judul
            $table->string('photo')->nullable();  // Foto hero (path)

            // Kolom tidak ditampilkan di index tapi tetap ada
            $table->text('description')->nullable();

            // Status aktif / tidak
            $table->enum('status', ['active', 'inactive'])->default('inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
