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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');                         // judul gallery
            $table->text('description')->nullable();        // deskripsi (di detail/edit aja)
            $table->string('photo');                        // foto disimpan dalam storage
            $table->enum('status', ['active', 'inactive'])  // status aktif/tidak
                  ->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
