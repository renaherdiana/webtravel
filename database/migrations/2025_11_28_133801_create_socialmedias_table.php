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
        Schema::create('socialmedias', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama media sosial, misal Instagram, TikTok');
            $table->string('account_name')->comment('Nama akun media sosial');
            $table->string('link')->comment('Link akun media sosial');
            $table->string('photo')->nullable()->comment('Foto/logo media sosial');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socialmedias');
    }
};
