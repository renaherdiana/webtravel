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
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');               // Nama pengirim
            $table->string('email');              // Email pengirim
            $table->string('phone')->nullable();  // Nomor telepon, optional
            $table->string('subject')->nullable();// Subject pesan, optional
            $table->text('message');              // Isi pesan
            $table->enum('status', ['unread', 'read'])->default('unread'); // Status pesan
            $table->timestamps();                 // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
