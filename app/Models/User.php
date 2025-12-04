<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Lengkapi1;
use App\Models\Lengkapi2;
use App\Models\Kehadiran;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_completed',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_completed' => 'boolean',
        ];
    }

    public function lengkapi1()
    {
        return $this->hasOne(Lengkapi1::class, 'user_id');
    }

    public function lengkapi2()
    {
        return $this->hasOne(Lengkapi2::class);
    }

    // Relasi ke Kehadiran
    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'user_id');
    }

    // Check if user is admin
    public function IsAdmin()
    {
        return $this->role === 'admin';
    }

    // Check if user is regular user
    public function isUser()
    {
        return $this->role === 'user';
    }

    // Method untuk mendapatkan statistik kehadiran
    public function getStatistikKehadiran($bulan = null, $tahun = null)
    {
        $query = $this->kehadiran();
        
        if ($bulan && $tahun) {
            $query->whereYear('tanggal', $tahun)
                  ->whereMonth('tanggal', $bulan);
        }

        $total = $query->count();
        $hadir = $query->where('status', 'HADIR')->count();
        $izin = $query->whereIn('status', ['IZIN', 'SAKIT'])->count();
        $alpha = $query->where('status', 'ALPHA')->count();
        
        $persentase = $total > 0 ? round(($hadir / $total) * 100, 1) : 0;

        return [
            'total' => $total,
            'hadir' => $hadir,
            'izin' => $izin,
            'alpha' => $alpha,
            'persentase' => $persentase
        ];
    }
}