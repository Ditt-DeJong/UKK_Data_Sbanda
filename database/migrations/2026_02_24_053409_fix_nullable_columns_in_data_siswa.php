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
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing('data_siswa');

        if (in_array('umur', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa MODIFY `umur` TINYINT UNSIGNED NULL");
        }
        if (in_array('nik_siswa', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa MODIFY `nik_siswa` BIGINT NULL");
        }
        if (in_array('jenis_kelamin', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa MODIFY `jenis_kelamin` VARCHAR(255) NULL");
        }
        if (in_array('kelas', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa MODIFY `kelas` VARCHAR(255) NULL");
        }
        if (in_array('nama_siswa', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa MODIFY `nama_siswa` VARCHAR(150) NULL");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // nothing
    }
};
