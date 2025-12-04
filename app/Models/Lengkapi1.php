<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lengkapi1 extends Model
{
    use HasFactory;

    protected $table = 'lengkapi1';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nik',
        'tempat_tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'agama',
        'kelas',
        'status_approval',
        'alasan_penolakan',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk data pending
    public function scopePending($query)
    {
        return $query->where('status_approval', 'pending');
    }

    // Scope untuk data approved
    public function scopeApproved($query)
    {
        return $query->where('status_approval', 'approved');
    }

    // Scope untuk data rejected
    public function scopeRejected($query)
    {
        return $query->where('status_approval', 'rejected');
    }

    // Check if approved
    public function isApproved()
    {
        return $this->status_approval === 'approved';
    }

    // Check if pending
    public function isPending()
    {
        return $this->status_approval === 'pending';
    }
}