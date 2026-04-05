<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing('data_orang_tua');

        if (in_array('Nama_Orang_Tua', $columns) && ! in_array('nama_orang_tua', $columns)) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE data_orang_tua CHANGE `Nama_Orang_Tua` `nama_orang_tua` VARCHAR(100) NULL');
        }
        if (in_array('Umur', $columns) && ! in_array('umur', $columns)) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE data_orang_tua CHANGE `Umur` `umur` INT NULL');
        } elseif (in_array('umur', $columns)) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE data_orang_tua MODIFY `umur` INT NULL');
        }
        if (in_array('Nomor_telepon', $columns) && ! in_array('nomor_telepon', $columns)) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE data_orang_tua CHANGE `Nomor_telepon` `nomor_telepon` VARCHAR(20) NULL');
        } elseif (in_array('nomor_telepon', $columns)) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE data_orang_tua MODIFY `nomor_telepon` VARCHAR(20) NULL');
        }
        if (in_array('Kode_Pos', $columns) && ! in_array('kode_pos', $columns)) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE data_orang_tua CHANGE `Kode_Pos` `kode_pos` INT NULL');
        } elseif (in_array('kode_pos', $columns)) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE data_orang_tua MODIFY `kode_pos` INT NULL');
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
