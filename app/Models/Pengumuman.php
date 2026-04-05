<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'konten',
        'tipe',
        'is_active',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(\App\Models\Admin::class, 'admin_id');
    }
}
