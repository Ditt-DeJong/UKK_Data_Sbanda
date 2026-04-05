<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use App\Models\Kehadiran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function jadwalkelas()
    {
        return view('website.jadwalkelas');
    }

    public function ajukanizin()
    {
        $riwayatIzin = Izin::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('website.ajukanizin', compact('riwayatIzin'));
    }

    public function submitIzin(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'tanggal_izin' => 'required|date',
            'alasan' => 'required|string',
            'keterangan' => 'nullable|string|max:250',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Cegah duplikasi izin di tanggal yang sama
        $exists = Izin::where('user_id', Auth::id())
            ->where('tanggal_izin', $request->tanggal_izin)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Anda sudah memiliki pengajuan izin di tanggal tersebut.');
        }

        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran_izin', 'public');
        }

        // Simpan data izin ke database
        Izin::create([
            'user_id' => Auth::id(),
            'siswa_id' => Auth::user()->dataSiswa->id,
            'nama_siswa' => $request->nama_siswa,
            'tanggal_izin' => $request->tanggal_izin,
            'alasan' => $request->alasan,
            'keterangan' => $request->keterangan,
            'status' => 'pending',
            'lampiran' => $lampiranPath,
        ]);

        return redirect()->route('ajukanizin')->with('success', 'Permohonan izin berhasil dikirim!');
    }

    public function cancelIzin($id)
    {
        $izin = Izin::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $izin->delete();

        return redirect()->back()->with('success', 'Pengajuan izin berhasil dibatalkan.');
    }

    public function kehadiran()
    {
        $user = Auth::user();

        // Ambil statistik kehadiran bulan ini
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        $statistik = $user->getStatistikKehadiran($bulan, $tahun);

        // Ambil kehadiran bulan ini
        $riwayatKehadiran = Kehadiran::where('user_id', $user->id)
            ->whereYear('tanggal', Carbon::now()->year)
            ->whereMonth('tanggal', Carbon::now()->month)
            ->orderBy('tanggal', 'desc')
            ->get();

        // Ambil pengumuman aktif
        $pengumuman = \App\Models\Pengumuman::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil nilai akademik
        $nilaiAkademik = \App\Models\NilaiAkademik::where('siswa_id', $user->dataSiswa->id)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('website.kehadiran', [
            'statistik' => $statistik,
            'riwayatKehadiran' => $riwayatKehadiran,
            'pengumuman' => $pengumuman,
            'nilaiAkademik' => $nilaiAkademik,
        ]);
    }
}
