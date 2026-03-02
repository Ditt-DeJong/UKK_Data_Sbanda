<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kehadiran;
use App\Models\Izins;
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

    public function submitIzin(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'tanggal_izin' => 'required|date',
            'alasan' => 'required|string',
            'keterangan' => 'nullable|string|max:250',
        ]);

        // Simpan data izin ke database
        Izins::create([
            'user_id' => Auth::id(),
            'siswa_id' => Auth::user()->dataSiswa->id,
            'nama_siswa' => $request->nama_siswa,
            'tanggal_izin' => $request->tanggal_izin,
            'alasan' => $request->alasan,
            'keterangan' => $request->keterangan,
            'status' => 'pending',
        ]);

        return redirect()->route('ajukanizin')->with('success', 'Permohonan izin berhasil dikirim!');
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