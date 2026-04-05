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
            $table->string('Nama siswa', 100)->change();
            $table->string('Tempat_Tanggal_Lahir')->after('Umur')->change();
            $table->string('Agama')->after('Tempat_Tanggal_Lahir')->change();
            $table->string('Kelas', 20)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_siswa', function (Blueprint $table) {
            $table->string('Nama siswa', 150)->change();
            $table->string('Kelas')->change();
        });
    }
};
