<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAkademik extends Model
{
    protected $table = 'nilai_akademik';

    protected $fillable = [
        'siswa_id',
        'mata_pelajaran',
        'jenis_nilai',
        'nilai_angka',
        'keterangan',
    ];

    public function siswa()
    {
        return $this->belongsTo(\App\Models\DataSiswa::class, 'siswa_id');
    }
}
