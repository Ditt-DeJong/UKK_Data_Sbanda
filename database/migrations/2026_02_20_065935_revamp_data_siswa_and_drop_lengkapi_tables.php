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
            if (! Schema::hasColumn('data_siswa', 'status_approval')) {
                $table->string('status_approval')->default('pending')->after('kelas');
            }
            if (! Schema::hasColumn('data_siswa', 'alasan_penolakan')) {
                $table->text('alasan_penolakan')->nullable()->after('status_approval');
            }
            if (! Schema::hasColumn('data_siswa', 'approved_at')) {
                $table->timestamp('approved_at')->nullable()->after('alasan_penolakan');
            }
        });

        // Modifikasi tabel izins agar foreign key ke lengkapi1 dihapus dulu
        Schema::table('izins', function (Blueprint $table) {
            if (! Schema::hasColumn('izins', 'status')) {
                $table->string('status')->default('pending')->after('keterangan');
            }
            // Ganti foreign key siswa_id ke data_siswa
            $table->dropForeign(['siswa_id']);
            $table->foreign('siswa_id')->references('id')->on('data_siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_siswa', function (Blueprint $table) {
            $table->dropColumn(['status_approval', 'alasan_penolakan', 'approved_at']);
        });
    }
};
