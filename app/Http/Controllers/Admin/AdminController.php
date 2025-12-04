<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Lengkapi1;
use App\Models\Lengkapi2;
use App\Models\Siswa;
use App\Models\data_orang_tua;
use Carbon\Carbon;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboard()
    {
        // Hitung statistik
        $totalSiswa = Siswa::count();
        $dataPending = Lengkapi1::pending()->count();
        $dataVerified = Lengkapi1::approved()->count();
        
        // Ambil data siswa terbaru (5 siswa)
        $siswaList = Siswa::latest()
            ->take(5)
            ->get();
        
        // Ambil data siswa pending untuk notifikasi
        $dataSiswaPending = Lengkapi1::with('user')
            ->pending()
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Hitung notifikasi pending
        $notifCount = $dataSiswaPending->count();
        
        // Debug - Uncomment untuk cek data
        // dd($dataSiswaPending);
        
        return view('admin.dashboard', compact(
            'totalSiswa',
            'dataPending',
            'dataVerified',
            'siswaList',
            'notifCount',
            'dataSiswaPending'
        ));
    }

    // Data Siswa
    public function dataSiswa()
    {
        $siswaList = Siswa::with(['user', 'orangTua'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Ambil data siswa pending untuk notifikasi modal
        $dataSiswaPending = Lengkapi1::with('user')
            ->pending()
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin.datasiswa', compact('siswaList', 'dataSiswaPending'));
    }

    // Get Notifikasi (untuk modal)
    public function getNotifikasi()
    {
        $dataSiswaPending = Lengkapi1::with('user')
            ->pending()
            ->orderBy('created_at', 'desc')
            ->get();
        
        $totalPending = $dataSiswaPending->count();
        
        return response()->json([
            'data' => $dataSiswaPending,
            'total' => $totalPending
        ]);
    }

    // Approve Data Siswa
    public function approveDataSiswa(Request $request, $id)
    {
        DB::beginTransaction();
        
        try {
            // Ambil data lengkapi1 & lengkapi2
            $lengkapi1 = Lengkapi1::findOrFail($id);
            $lengkapi2 = Lengkapi2::where('user_id', $lengkapi1->user_id)->firstOrFail();
            
            // Cek apakah kedua data sudah pending
            if (!$lengkapi1->isPending() || !$lengkapi2->isPending()) {
                return back()->with('error', 'Data sudah diproses sebelumnya!');
            }
            
            // Copy ke tabel data_siswa
            $siswa = Siswa::create([
                'user_id' => $lengkapi1->user_id,
                'nama_siswa' => $lengkapi1->nama_lengkap,
                'nik_siswa' => $lengkapi1->nik,
                'tempat_tanggal_lahir' => $lengkapi1->tempat_tanggal_lahir,
                'alamat' => $lengkapi1->alamat,
                'jenis_kelamin' => $lengkapi1->jenis_kelamin,
                'agama' => $lengkapi1->agama,
                'kelas' => $lengkapi1->kelas,
            ]);
            
            // Copy ke tabel data_orang_tua
            data_orang_tua::create([
                'user_id' => $lengkapi2->user_id,
                'siswa_id' => $siswa->id,
                'nama_orang_tua' => $lengkapi2->nama_wali,
                'nik_orang_tua' => $lengkapi2->nik_wali,
                'alamat' => $lengkapi2->alamat_wali,
                'nomor_telepon' => $lengkapi2->nomor_telepon_wali,
                'agama' => $lengkapi2->agama_wali,
                'pekerjaan' => $lengkapi2->pekerjaan_wali,
                'peran_wali' => $lengkapi2->peran_wali,
            ]);
            
            // Update status approval
            $lengkapi1->update([
                'status_approval' => 'approved',
                'approved_at' => Carbon::now()
            ]);
            
            $lengkapi2->update([
                'status_approval' => 'approved',
                'approved_at' => Carbon::now()
            ]);
            
            DB::commit();
            
            return back()->with('success', 'Data siswa berhasil disetujui!');
            
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Reject Data Siswa
    public function rejectDataSiswa(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:500'
        ]);
        
        DB::beginTransaction();
        
        try {
            $lengkapi1 = Lengkapi1::findOrFail($id);
            $lengkapi2 = Lengkapi2::where('user_id', $lengkapi1->user_id)->first();
            
            // Update status ke rejected
            $lengkapi1->update([
                'status_approval' => 'rejected',
                'alasan_penolakan' => $request->alasan_penolakan
            ]);
            
            if ($lengkapi2) {
                $lengkapi2->update([
                    'status_approval' => 'rejected',
                    'alasan_penolakan' => $request->alasan_penolakan
                ]);
            }
            
            // Update user is_completed ke false
            $user = User::find($lengkapi1->user_id);
            $user->is_completed = false;
            $user->save();
            
            DB::commit();
            
            return back()->with('success', 'Data siswa berhasil ditolak!');
            
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Logout Admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }
}