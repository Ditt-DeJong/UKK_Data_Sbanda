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
        Schema::table('data_orang_tua', function (Blueprint $table) {
            // Check if column exists before changing, or wrap in try-catch if needed.
            // But since this is a modification of existing columns, let's assume `alamat` and `agama` are the correct names.
            if (Schema::hasColumn('data_orang_tua', 'alamat_orang_tua')) {
                $table->string('alamat_orang_tua')->nullable()->change();
            } else if (Schema::hasColumn('data_orang_tua', 'alamat')) {
                $table->string('alamat')->nullable()->change();
            }

            if (Schema::hasColumn('data_orang_tua', 'agama_orang_tua')) {
                $table->string('agama_orang_tua')->nullable()->change();
            } else if (Schema::hasColumn('data_orang_tua', 'agama')) {
                $table->string('agama')->nullable()->change();
            }

            if (Schema::hasColumn('data_orang_tua', 'nik_orang_tua')) {
                $table->string('nik_orang_tua')->nullable()->change();
            }
            if (Schema::hasColumn('data_orang_tua', 'pekerjaan')) {
                $table->string('pekerjaan')->nullable()->change();
            }
            if (Schema::hasColumn('data_orang_tua', 'peran_wali')) {
                $table->string('peran_wali')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_orang_tua', function (Blueprint $table) {
            $table->string('alamat_orang_tua')->change();
            $table->string('agama_orang_tua')->change();
            $table->string('agama_orang_tua')->change();
            $table->bigInteger('nik_orang_tua')->change();
            $table->string('pekerjaan')->change();
            $table->string('peran_wali')->change();
        });
    }
};
