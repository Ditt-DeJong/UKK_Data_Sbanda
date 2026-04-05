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
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('Nama siswa', 150);
            $table->tinyInteger('Umur')->unsigned();
            $table->string('Alamat', 100);
            $table->string('Kelas');
            $table->bigInteger('NIK_Siswa');
            $table->enum('Agama', ['Islam', 'Kristen', 'Katolik', 'Hindhu', 'Buddha', 'Konghucu']);
            $table->string('Tempat_Tanggal_Lahir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_siswa');
    }
};
