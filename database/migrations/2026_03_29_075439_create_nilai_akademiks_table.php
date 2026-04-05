<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_akademik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('data_siswa')->cascadeOnDelete();
            $table->string('mata_pelajaran');
            $table->string('jenis_nilai'); // Tugas, Ulangan Harian, UTS, UAS
            $table->integer('nilai_angka');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_akademik');
    }
};
