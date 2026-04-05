<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('data_siswa', function (Blueprint $table) {

            // Rename kolom ke snake_case standar
            $table->renameColumn('Umur', 'umur');
            $table->renameColumn('Agama', 'agama');
            $table->renameColumn('Alamat', 'alamat');
            $table->renameColumn('Kelas', 'kelas');
        });
        // Menambahkan kolom baru 'status'
        Schema::table('data_siswa', function (Blueprint $table) {
            $table->enum('status', ['aktif', 'pending', 'nonaktif'])
                ->default('aktif')
                ->after('kelas'); // opsional
        });
    }

    public function down()
    {
        Schema::table('data_siswa', function (Blueprint $table) {
            // Kembalikan nama kolom ke format sebelumnya jika perlu
            $table->renameColumn('umur', 'Umur');
            $table->renameColumn('agama', 'Agama');
            $table->renameColumn('alamat', 'Alamat');
            $table->renameColumn('kelas', 'Kelas');
        });
        Schema::table('data_siswa', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
