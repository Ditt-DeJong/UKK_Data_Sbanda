<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSiswa;
use App\Models\NilaiAkademik;
use Illuminate\Http\Request;

class NilaiAkademikController extends Controller
{
    public function index()
    {
        // Mengambil data siswa yang aktif / approved untuk list
        $siswa = DataSiswa::where('status_approval', 'approved')
            ->orderBy('nama_siswa', 'asc')
            ->get();

        return view('admin.kelola_nilai', compact('siswa'));
    }

    public function detailSiswa($id)
    {
        $siswa = DataSiswa::findOrFail($id);

        $nilai = NilaiAkademik::where('siswa_id', $id)
            ->orderBy('mata_pelajaran', 'asc')
            ->orderBy('jenis_nilai', 'asc')
            ->get();

        // Render raw HTML partial for modal/detail
        $html = view('admin.partials.nilai_table', compact('siswa', 'nilai'))->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:data_siswa,id',
            'mata_pelajaran' => 'required|string|max:255',
            'jenis_nilai' => 'required|string|max:100', // e.g., Tugas 1, Ulangan Harian, dll.
            'nilai_angka' => 'required|integer|min:0|max:100',
            'keterangan' => 'nullable|string|max:255',
        ]);

        NilaiAkademik::create($request->only([
            'siswa_id', 'mata_pelajaran', 'jenis_nilai', 'nilai_angka', 'keterangan',
        ]));

        return redirect()->back()->with('success', 'Nilai akademik berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $nilai = NilaiAkademik::findOrFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Data nilai berhasil dihapus!');
    }
}
