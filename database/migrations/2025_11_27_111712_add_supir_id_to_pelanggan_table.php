<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->foreignId('supir_id')
                  ->nullable()
                  ->after('status')
                  ->constrained('supirs')
                  ->onDelete('set null'); // jika supir dihapus, set null
        });
    }

    public function down(): void
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->dropForeign(['supir_id']);
            $table->dropColumn('supir_id');
        });
    }
};
