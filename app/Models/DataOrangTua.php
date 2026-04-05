<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataOrangTua extends Model
{
    protected $table = 'data_orang_tua';

    protected $fillable = [
        'user_id',
        'siswa_id',
        'nama_orang_tua',
        'nik_orang_tua',
        'alamat_orang_tua',
        'nomor_telepon',
        'agama_orang_tua',
        'pekerjaan',
        'peran_wali',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(DataSiswa::class, 'siswa_id');
    }
}
