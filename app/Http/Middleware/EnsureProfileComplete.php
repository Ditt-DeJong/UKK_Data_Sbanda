<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * Cek apakah user sudah melengkapi data siswa (lengkapi1) dan data orang tua (lengkapi2).
     * Jika belum, redirect ke halaman yang sesuai.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Jika user belum login, biarkan middleware auth yang handle
        if (!$user) {
            return $next($request);
        }

        // Cek apakah user adalah admin, jika ya, skip pengecekan
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Cek apakah sudah lengkap (flag is_completed)
        // Cek apakah sudah mengisi data siswa
        if (!$user->dataSiswa) {
            if ($request->routeIs('lengkapi1') || $request->routeIs('lengkapi1.submit')) {
                return $next($request);
            }
            return redirect()->route('lengkapi1')
                ->with('warning', 'Silakan lengkapi data siswa terlebih dahulu.');
        }

        // Cek apakah sudah mengisi data orang tua
        if (!$user->dataOrangTua) {
            if ($request->routeIs('lengkapi2.form') || $request->routeIs('lengkapi2.submit')) {
                return $next($request);
            }
            return redirect()->route('lengkapi2.form')
                ->with('warning', 'Silakan lengkapi data orang tua terlebih dahulu.');
        }

        // Kalau sudah isi Form 2 (alias is_completed), cek apakah di-approve
        if ($user->dataSiswa->status_approval !== 'approved') {
            if ($request->routeIs('waiting.room')) {
                return $next($request);
            }
            return redirect()->route('waiting.room');
        }

        return $next($request);
    }
}
