<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Kehadiran;
use Carbon\Carbon;

class MainController extends Controller
{
    public function jadwalkelas()
    {
        return view('website.jadwalkelas');
    }

    public function ajukanizin()
    {
        return view('website.ajukanizin');
    }

    public function kehadiran()
    {   
        $user = Auth::user();
        
        // Ambil statistik kehadiran bulan ini
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        $statistik = $user->getStatistikKehadiran($bulan, $tahun);
        
        // Ambil 5 hari kehadiran terakhir
        $riwayatKehadiran = Kehadiran::where('user_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->take(5)
            ->get();
        
        return view('website.kehadiran', [
            'statistik' => $statistik,
            'riwayatKehadiran' => $riwayatKehadiran
        ]);
    }
}