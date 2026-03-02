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
        // Menambahkan kolom di data_siswa
        Schema::table('data_siswa', function (Blueprint $table) {
            if (!Schema::hasColumn('data_siswa', 'status_approval')) {
                $table->string('status_approval')->default('pending')->after('kelas');
            }
            if (!Schema::hasColumn('data_siswa', 'alasan_penolakan')) {
                $table->text('alasan_penolakan')->nullable()->after('status_approval');
            }
            if (!Schema::hasColumn('data_siswa', 'approved_at')) {
                $table->timestamp('approved_at')->nullable()->after('alasan_penolakan');
            }
        });

        // Modifikasi tabel izins agar foreign key ke lengkapi1 dihapus dulu
        Schema::table('izins', function (Blueprint $table) {
            if (!Schema::hasColumn('izins', 'status')) {
                $table->string('status')->default('pending')->after('keterangan');
            }
            // Ganti foreign key siswa_id ke data_siswa
            $table->dropForeign(['siswa_id']);
            $table->foreign('siswa_id')->references('id')->on('data_siswa')->onDelete('cascade');
        });

        // Menghapus tabel lengkapi1 dan lengkapi2
        Schema::dropIfExists('lengkapi1');
        Schema::dropIfExists('lengkapi2');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_siswa', function (Blueprint $table) {
            $table->dropColumn(['status_approval', 'alasan_penolakan', 'approved_at']);
        });

        // Dalam down, kita buat ulang tabel lengkapi1 dan lengkapi2 seadanya 
        // agar fitur rollback tetap bisa berjalan
        Schema::create('lengkapi1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('tempat_tanggal_lahir');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('kelas');
            $table->string('status_approval')->default('pending');
            $table->text('alasan_penolakan')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });

        Schema::create('lengkapi2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_wali');
            $table->string('nik_wali');
            $table->string('alamat_wali');
            $table->string('nomor_telepon_wali');
            $table->string('agama_wali');
            $table->string('pekerjaan_wali');
            $table->string('peran_wali');
            $table->string('status_approval')->default('pending');
            $table->text('alasan_penolakan')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }
};
