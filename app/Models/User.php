<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function dataSiswa()
    {
        return $this->hasOne(DataSiswa::class, 'user_id');
    }

    public function dataOrangTua()
    {
        return $this->hasOne(DataOrangTua::class, 'user_id');
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
        $baseQuery = $this->kehadiran();

        if ($bulan && $tahun) {
            $baseQuery->whereYear('tanggal', $tahun)
                ->whereMonth('tanggal', $bulan);
        }

        $total = (clone $baseQuery)->count();
        $hadir = (clone $baseQuery)->where('status', 'HADIR')->count();
        $izin = (clone $baseQuery)->whereIn('status', ['IZIN', 'SAKIT'])->count();
        $alpha = (clone $baseQuery)->where('status', 'ALPHA')->count();

        $persentase = $total > 0 ? round(($hadir / $total) * 100, 1) : 0;

        return [
            'total' => $total,
            'hadir' => $hadir,
            'izin' => $izin,
            'alpha' => $alpha,
            'persentase' => $persentase,
        ];
    }
}
