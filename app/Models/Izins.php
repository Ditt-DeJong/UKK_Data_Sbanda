<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izins extends Model
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
    ];

    public function siswa()
    {
        return $this->belongsTo(Data_siswa::class, 'siswa_id');
    }
}
