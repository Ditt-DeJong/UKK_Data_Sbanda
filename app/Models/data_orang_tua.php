<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_orang_tua extends Model
{
    protected $table = 'data_orang_tua';
    
    protected $fillable = [
        'user_id',
        'siswa_id',
        'nama_orang_tua',
        'nik_orang_tua',
        'alamat',
        'nomor_telepon',
        'agama',
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
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}