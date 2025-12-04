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
        Schema::create('izins', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('alasan', ['S (Sakit)', 'A (Alfa)', 'I (Izin)', 'Lainnya']);
            $table->date('tanggal_izin');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('lengkapi1')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izins');
    }
};
