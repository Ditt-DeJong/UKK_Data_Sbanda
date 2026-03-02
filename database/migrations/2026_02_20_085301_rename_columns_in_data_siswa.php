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
        // Safe rename using raw query if column exists
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing('data_siswa');
        
        if (in_array('Nama siswa', $columns) && !in_array('nama_siswa', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa CHANGE `Nama siswa` `nama_siswa` VARCHAR(100)");
        }
        if (in_array('NIK_Siswa', $columns) && !in_array('nik_siswa', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa CHANGE `NIK_Siswa` `nik_siswa` BIGINT");
        }
        if (in_array('Tempat_Tanggal_Lahir', $columns) && !in_array('tempat_tanggal_lahir', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa CHANGE `Tempat_Tanggal_Lahir` `tempat_tanggal_lahir` VARCHAR(255)");
        }
        if (in_array('Jenis_Kelamin', $columns) && !in_array('jenis_kelamin', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa CHANGE `Jenis_Kelamin` `jenis_kelamin` VARCHAR(255)");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing('data_siswa');
        
        if (in_array('nama_siswa', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa CHANGE `nama_siswa` `Nama siswa` VARCHAR(100)");
        }
        if (in_array('nik_siswa', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa CHANGE `nik_siswa` `NIK_Siswa` BIGINT");
        }
        if (in_array('tempat_tanggal_lahir', $columns)) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE data_siswa CHANGE `tempat_tanggal_lahir` `Tempat_Tanggal_Lahir` VARCHAR(255)");
        }
    }
};
