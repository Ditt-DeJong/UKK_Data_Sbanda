<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Kehadiran;
use App\Models\data_siswa;
use App\Models\data_orang_tua;

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
        return $this->hasOne(data_siswa::class, 'user_id');
    }

    public function dataOrangTua()
    {
        return $this->hasOne(data_orang_tua::class, 'user_id');
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