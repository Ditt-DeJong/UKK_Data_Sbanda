<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function index()
    {
        $izins = \App\Models\Izins::with('siswa')->latest()->get();
        return view('admin.kelola_izin', compact('izins'));
    }

    public function approve($id)
    {
        $izin = \App\Models\Izins::findOrFail($id);
        
        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            $izin->update(['status' => 'approved']);
            
            $statusMap = [
                'S (Sakit)' => 'SAKIT',
                'I (Ijin)' => 'IZIN',
                'I (Izin)' => 'IZIN',
                'A (Alfa)' => 'ALPHA',
                'Lainnya' => 'IZIN'
            ];
            
            $statusKehadiran = $statusMap[$izin->alasan] ?? 'IZIN';

            // Masukkan ke tabel kehadiran
            \App\Models\Kehadiran::create([
                'user_id' => $izin->user_id,
                'tanggal' => $izin->tanggal_izin,
                'status' => $statusKehadiran,
                'keterangan' => $izin->keterangan ?? 'Sudah disetujui',
            ]);
            
            \Illuminate\Support\Facades\DB::commit();
            return back()->with('success', 'Izin berhasil disetujui!');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function reject($id)
    {
        $izin = \App\Models\Izins::findOrFail($id);
        $izin->update(['status' => 'rejected']);
        
        return back()->with('success', 'Izin ditolak!');
    }
}
