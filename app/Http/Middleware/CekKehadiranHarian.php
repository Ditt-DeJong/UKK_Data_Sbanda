<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\Kehadiran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; // pakai Facade

class CekKehadiranHarian
{
    public function handle($request, Closure $next)
    {
        // pakai Auth::check() untuk memastikan konteks web + user telah login
        if (Auth::check()) {
            $tanggal = Carbon::today()->toDateString();

            Kehadiran::firstOrCreate(
                ['user_id' => Auth::id(), 'tanggal' => $tanggal],
                ['status' => 'HADIR', 'keterangan' => 'Tepat waktu']
            );
        }

        return $next($request);
    }
}
