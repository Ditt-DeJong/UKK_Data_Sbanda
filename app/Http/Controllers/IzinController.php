<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izins;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    public function index()
    {
        return view('website.ajukanizin'); // tampilan form
    }

    public function submit(Request $request)
{
    $request->validate([
        'nama_siswa' => 'required|string|max:255',
        'tanggal_izin' => 'required|date',
        'alasan' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
    ]);

    // simpan izin
    $izin = Izins::create($request->all());

    // ubah status kehadiran hari tersebut
    \App\Models\Kehadiran::updateOrCreate(
        [
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal_izin
        ],
        [
            'status' => $request->alasan, // SAKIT / IZIN / ALFA
            'keterangan' => $request->keterangan ?? $request->alasan
        ]
    );

    return redirect()->back()->with('success', 'Data izin berhasil diajukan!');
}

}
