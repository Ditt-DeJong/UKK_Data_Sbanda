<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lengkapi2 extends Model
{
    use HasFactory;

    protected $table = 'lengkapi2';

    protected $fillable = [
        'user_id',
        'nama_wali',
        'nik_wali',
        'alamat_wali',
        'nomor_telepon_wali',
        'agama_wali',
        'pekerjaan_wali',
        'peran_wali',
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