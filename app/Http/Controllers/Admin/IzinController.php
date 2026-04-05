<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function index()
    {
        $izins = \App\Models\Izin::with('siswa')->latest()->get();

        return view('admin.kelola_izin', compact('izins'));
    }

    public function approve($id)
    {
        $izin = \App\Models\Izin::findOrFail($id);

        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            $izin->update(['status' => 'approved']);

            $statusMap = [
                'S (Sakit)' => 'SAKIT',
                'I (Izin)' => 'IZIN',
                'A (Alfa)' => 'ALPHA',
                'Lainnya' => 'IZIN',
            ];

            $statusKehadiran = $statusMap[$izin->alasan] ?? 'IZIN';

            // Masukkan/Update ke tabel kehadiran
            \App\Models\Kehadiran::updateOrCreate(
                ['user_id' => $izin->user_id, 'tanggal' => $izin->tanggal_izin],
                ['status' => $statusKehadiran, 'keterangan' => $izin->keterangan ?? 'Sudah disetujui']
            );

            \Illuminate\Support\Facades\DB::commit();

            return back()->with('success', 'Izin berhasil disetujui!');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();

            return back()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    public function reject(Request $request, $id)
    {
        $izin = \App\Models\Izin::findOrFail($id);

        $izin->update([
            'status' => 'rejected',
            'alasan_penolakan' => $request->alasan_penolakan ?? 'Izin tidak disetujui oleh admin',
        ]);

        // Otomatis tandai ALPHA saat izin ditolak
        \App\Models\Kehadiran::updateOrCreate(
            ['user_id' => $izin->user_id, 'tanggal' => $izin->tanggal_izin],
            ['status' => 'ALPHA', 'keterangan' => 'Izin ditolak: '.($request->alasan_penolakan ?? '-')]
        );

        return back()->with('success', 'Izin ditolak dan status kehadiran disetel ke ALPHA!');
    }
}
