<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSiswa;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::orderBy('hari')
            ->orderBy('jam_mulai')
            ->get()
            ->groupBy('hari');

        $dataSiswaPending = DataSiswa::where('status_approval', 'pending')->get();
        $notifCount = $dataSiswaPending->count();

        return view('admin.kelola_jadwal', compact('jadwal', 'dataSiswaPending', 'notifCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'mata_pelajaran' => 'required|string|max:255',
            'guru' => 'required|string|max:255',
            'ruangan' => 'nullable|string|max:255',
        ]);

        Jadwal::create($request->all());

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'mata_pelajaran' => 'required|string|max:255',
            'guru' => 'required|string|max:255',
            'ruangan' => 'nullable|string|max:255',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus!');
    }
}
