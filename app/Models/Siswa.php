<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'data_siswa';
    
    protected $fillable = [
        'user_id',
        'nama_siswa',
        'nik_siswa',
        'tempat_tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'agama',
        'kelas',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Orang Tua
    public function orangTua()
    {
        return $this->hasOne(data_orang_tua::class, 'siswa_id');
    }
}