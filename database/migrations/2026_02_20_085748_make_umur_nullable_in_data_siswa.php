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
        Schema::table('data_siswa', function (Blueprint $table) {
            // Update umur and ensure it's nullable so it won't crash on insert
            if (Schema::hasColumn('data_siswa', 'umur')) {
                $table->integer('umur')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_siswa', function (Blueprint $table) {
            if (Schema::hasColumn('data_siswa', 'umur')) {
                $table->integer('umur')->nullable(false)->change();
            }
        });
    }
};
