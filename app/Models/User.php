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

    public function getStatistikKehadiran($bulan = null, $tahun = null)
    {
        $baseQuery = $this->kehadiran();

        if ($bulan && $tahun) {
            $baseQuery->whereYear('tanggal', $tahun)
                ->whereMonth('tanggal', $bulan);
        }

        $hadir = (clone $baseQuery)->where('status', 'HADIR')->count();
        $izin = (clone $baseQuery)->whereIn('status', ['IZIN', 'SAKIT'])->count();
        $alphaDB = (clone $baseQuery)->where('status', 'ALPHA')->count();

        // Calculate total working days (Mon-Fri) in the month up to today
        $now = \Carbon\Carbon::now();
        $bulanFilter = $bulan ?: $now->month;
        $tahunFilter = $tahun ?: $now->year;
        
        $startOfMonth = \Carbon\Carbon::create($tahunFilter, $bulanFilter, 1)->startOfMonth();
        $endOfMonth = \Carbon\Carbon::create($tahunFilter, $bulanFilter, 1)->endOfMonth();
        
        $endDate = ($now->month == $bulanFilter && $now->year == $tahunFilter) ? $now : $endOfMonth;
        
        $totalHariKerja = 0;
        for ($date = $startOfMonth->copy(); $date->lte($endDate); $date->addDay()) {
            if ($date->isWeekday()) {
                $totalHariKerja++;
            }
        }

        $alpha = max($alphaDB, $totalHariKerja - ($hadir + $izin));
        $persentase = $totalHariKerja > 0 ? round(($hadir / $totalHariKerja) * 100, 1) : 0;

        return [
            'total' => $totalHariKerja,
            'hadir' => $hadir,
            'izin' => $izin,
            'alpha' => $alpha,
            'persentase' => $persentase,
        ];
    }
}
