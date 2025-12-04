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
        // Tambah kolom di lengkapi1
        Schema::table('lengkapi1', function (Blueprint $table) {
            $table->enum('status_approval', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->after('kelas');
            $table->text('alasan_penolakan')->nullable()->after('status_approval');
            $table->timestamp('approved_at')->nullable()->after('alasan_penolakan');
        });

        // Tambah kolom di lengkapi2
        Schema::table('lengkapi2', function (Blueprint $table) {
            $table->enum('status_approval', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->after('peran_wali');
            $table->text('alasan_penolakan')->nullable()->after('status_approval');
            $table->timestamp('approved_at')->nullable()->after('alasan_penolakan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lengkapi1', function (Blueprint $table) {
            $table->dropColumn(['status_approval', 'alasan_penolakan', 'approved_at']);
        });

        Schema::table('lengkapi2', function (Blueprint $table) {
            $table->dropColumn(['status_approval', 'alasan_penolakan', 'approved_at']);
        });
    }
};