<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->get();

        return view('admin.kelola_pengumuman', compact('pengumuman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'tipe' => 'required|string|in:info,penting,libur',
        ]);

        $admin = Auth::guard('admin')->user();
        $adminId = $admin && \App\Models\Admin::find($admin->id) ? $admin->id : null;

        Pengumuman::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'tipe' => $request->tipe,
            'admin_id' => $adminId,
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'tipe' => 'required|string|in:info,penting,libur',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'tipe' => $request->tipe,
        ]);

        return redirect()->back()->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function toggle($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update(['is_active' => ! $pengumuman->is_active]);

        return redirect()->back()->with('success', 'Status pengumuman berhasil diubah!');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->back()->with('success', 'Pengumuman berhasil dihapus!');
    }
}
