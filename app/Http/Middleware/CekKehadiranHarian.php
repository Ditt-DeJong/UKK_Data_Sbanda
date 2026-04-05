<?php

namespace App\Http\Middleware;

use App\Models\Izin;
use App\Models\Kehadiran;
use App\Services\WhatsAppService;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class CekKehadiranHarian
{
    public function handle($request, Closure $next)
    {
        // pakai Auth::check() untuk memastikan konteks web + user telah login
        if (Auth::check()) {
            $now = Carbon::now();

            // Lewati absensi pada hari Sabtu dan Minggu
            if ($now->isWeekend()) {
                return $next($request);
            }

            $tanggal = Carbon::today()->toDateString();

            // Batas waktu hadir: Hari ini jam 08:00:00
            $batasHadir = Carbon::today()->setTime(8, 0, 0);

            // Cek apakah siswa sudah mengajukan izin hari ini (pending/approved)
            $punyaIzin = Izin::where('user_id', Auth::id())
                ->where('tanggal_izin', $tanggal)
                ->whereIn('status', ['pending', 'approved'])
                ->exists();

            if (! $punyaIzin) {
                // Tentukan status dan keterangan
                if ($now->lessThanOrEqualTo($batasHadir)) {
                    $status = 'HADIR';
                    $keterangan = 'Tepat waktu';
                } else {
                    $status = 'ALPHA';
                    $keterangan = 'murid dinyatakan alpha karena tidak hadir dan tidak memberikan surat ijin, mohon ajukan ijin segera';
                }

                $record = Kehadiran::firstOrCreate(
                    ['user_id' => Auth::id(), 'tanggal' => $tanggal],
                    ['status' => $status, 'keterangan' => $keterangan]
                );

                // Jika rekam absensi baru dibuat dan itu ALPHA, panggil WA Gateway
                if ($record->wasRecentlyCreated && $status == 'ALPHA') {
                    $user = Auth::user();
                    $orangTua = $user->dataOrangTua;

                    if ($orangTua && $orangTua->nomor_telepon) {
                        $namaSiswa = $user->dataSiswa->nama_siswa ?? 'Siswa SBANDA';
                        WhatsAppService::sendAlphaNotification($orangTua->nomor_telepon, $namaSiswa, $tanggal);
                    }
                }
            }
        }

        return $next($request);
    }
}
