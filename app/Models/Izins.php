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
    ];

    public function siswa()
    {
        return $this->belongsTo(Lengkapi1::class, 'siswa_id');
    }
}
