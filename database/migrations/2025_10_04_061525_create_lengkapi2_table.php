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
        Schema::create('lengkapi2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_wali');
            $table->string('nik_wali', 16);
            $table->string('alamat_wali');
            $table->string('nomor_telepon_wali', 15);
            $table->enum('agama_wali', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->enum('pekerjaan_wali', ['Pegawai Negri', 'Pegawai Swasta', 'Kehutanan', 'Kesehatan', 'Keamanan', 'Mengurus Rumah Tangga (Ibu)', 'Yang Lainnya', 'Tidak Bekerja']);
            $table->enum('peran_wali', ['Ayah', 'Ibu', 'Kakak_yatim', 'Paman_Bibi_yatim']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lengkapi2');
    }
};
