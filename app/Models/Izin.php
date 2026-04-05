<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izins';

    protected $fillable = [
        'siswa_id',
        'user_id',
        'nama_siswa',
        'tanggal_izin',
        'alasan',
        'keterangan',
        'status',
        'lampiran',
        'alasan_penolakan',
    ];

    public function siswa()
    {
        return $this->belongsTo(DataSiswa::class, 'siswa_id');
    }
}
