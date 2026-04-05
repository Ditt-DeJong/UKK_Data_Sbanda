<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $table = 'data_siswa';

    protected $fillable = [
        'user_id',
        'nama_siswa',
        'nik_siswa',
        'jenis_kelamin',
        'umur',
        'kelas',
        'status',
        'tempat_tanggal_lahir',
        'alamat',
        'agama',
        'status_approval',
        'alasan_penolakan',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Orang Tua
    public function orangTua()
    {
        return $this->hasOne(DataOrangTua::class, 'siswa_id');
    }
}
