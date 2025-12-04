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
        // Update tabel data_siswa
        Schema::table('data_siswa', function (Blueprint $table) {
            // Tambah user_id jika belum ada
            if (!Schema::hasColumn('data_siswa', 'user_id')) {
                $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
            }
            
            // Tambah jenis_kelamin jika belum ada
            if (!Schema::hasColumn('data_siswa', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->after('Alamat');
            }
        });

        // Update tabel data_orang_tua
        Schema::table('data_orang_tua', function (Blueprint $table) {
            // Tambah user_id jika belum ada
            if (!Schema::hasColumn('data_orang_tua', 'user_id')) {
                $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
            }
            
            // Tambah siswa_id jika belum ada
            if (!Schema::hasColumn('data_orang_tua', 'siswa_id')) {
                $table->foreignId('siswa_id')->after('user_id')->constrained('data_siswa')->onDelete('cascade');
            }
            
            // Tambah peran_wali jika belum ada
            if (!Schema::hasColumn('data_orang_tua', 'peran_wali')) {
                $table->string('peran_wali')->after('Pekerjaan')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_siswa', function (Blueprint $table) {
            if (Schema::hasColumn('data_siswa', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('data_siswa', 'jenis_kelamin')) {
                $table->dropColumn('jenis_kelamin');
            }
        });

        Schema::table('data_orang_tua', function (Blueprint $table) {
            if (Schema::hasColumn('data_orang_tua', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('data_orang_tua', 'siswa_id')) {
                $table->dropForeign(['siswa_id']);
                $table->dropColumn('siswa_id');
            }
            if (Schema::hasColumn('data_orang_tua', 'peran_wali')) {
                $table->dropColumn('peran_wali');
            }
        });
    }
};