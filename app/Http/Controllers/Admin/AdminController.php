<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use App\Models\Data_siswa;
use App\Models\data_orang_tua;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboard()
    {
        $totalSiswa = Data_siswa::count();
        $dataPending = Data_siswa::where('status_approval', 'pending')->count();
        $dataVerified = Data_siswa::where('status_approval', 'approved')->count();
        
        $izins = \App\Models\Izins::with('siswa')->latest()->get();
        
        $siswaList = Data_siswa::with(['user', 'orangTua'])
            ->latest()
            ->take(5)
            ->get();
        
        $dataSiswaPending = Data_siswa::with(['user', 'orangTua'])
            ->where('status_approval', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $notifCount = $dataSiswaPending->count();
        
        return view('admin.dashboard', compact(
            'totalSiswa',
            'dataPending',
            'dataVerified',
            'siswaList',
            'notifCount',
            'dataSiswaPending',
            'izins'
        ));
    }

    // Data Siswa
    public function dataSiswa()
    {
        $siswaList = Data_siswa::with(['user', 'orangTua'])
            ->orderBy('created_at', 'desc')
            ->get();


        $dataSiswaPending = Data_siswa::with(['user', 'orangTua'])
            ->where('status_approval', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        // Statistik (case-insensitive comparison)
        $totalSiswa = $siswaList->count();
        $siswaAktif = $siswaList->filter(fn($s) => strtolower($s->status) === 'aktif')->count();
        $siswaPending = $siswaList->filter(fn($s) => strtolower($s->status) === 'pending')->count();

        return view('admin.datasiswa', compact(
            'siswaList',
            'dataSiswaPending',
            'totalSiswa',
            'siswaAktif',
            'siswaPending',
        ));
    }


    // ============================================
    // TAMBAH DATA SISWA
    // ============================================
    public function storeSiswa(Request $request)
    {
        $request->validate([
            'nik_siswa' => 'required|string|max:20|unique:data_siswa,nik_siswa',
            'nama_siswa' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:20',
            'umur' => 'required|string|max:20',
            'kelas' => 'required|string|max:20',
            'status' => 'required|string|max:15',

            // orang tua
            'nama_orang_tua' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        DB::beginTransaction();

        try {

            // buat user baru untuk siswa
            $user = User::create([
                'name' => $request->nama_siswa,
                'email' => strtolower(str_replace(' ', '', $request->nama_siswa)) . rand(100,999) . "@mail.com",
                'password' => bcrypt('password123'),
                'is_completed' => true,
            ]);

            // simpan siswa
            $siswa = Data_siswa::create([
                'user_id'       => $user->id,
                'nik_siswa'     => $request->nik_siswa,
                'nama_siswa'    => $request->nama_siswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur'          => $request->umur,
                'kelas'         => $request->kelas,
                'status'        => $request->status,
                'status_approval' => 'approved',
                'approved_at'   => Carbon::now(),
            ]);

            // simpan orang tua (opsional)
            data_orang_tua::create([
                'user_id'   => $user->id,
                'siswa_id'  => $siswa->id,
                'nama_orang_tua' => $request->nama_orang_tua,
                'nomor_telepon'  => $request->nomor_telepon,
            ]);

            DB::commit();
            return redirect()->route('admin.datasiswa')->with('success', 'Data siswa berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollback();
            \Log::error($e);
            return back()->with('error', $e->getMessage());
        }
    }


    // ============================================
    // EDIT DATA SISWA
    // ============================================
    public function updateSiswa(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nik_siswa' => 'required|string|size:16|unique:data_siswa,nik_siswa,' . $id,
            'umur' => 'required|integer|min:1|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kelas' => 'required|string|max:20',
            'status' => 'required|string|max:15',
            
            // Data Orang Tua
            'nama_orang_tua' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
        ]);

        DB::beginTransaction();
        
        try {
            $siswa = Data_siswa::findOrFail($id);
            
            // Update Data Siswa
            $siswa->update([
                'nama_siswa' => $request->nama_siswa,
                'nik_siswa' => $request->nik_siswa,
                'umur' => $request->umur,
                'status' => $request->status,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kelas' => $request->kelas,
            ]);
            
            // Update Data Orang Tua
            $orangTua = data_orang_tua::where('siswa_id', $siswa->id)->first();
            
            if ($orangTua) {
                $orangTua->update([
                    'nama_orang_tua' => $request->nama_orang_tua,
                    'nomor_telepon' => $request->nomor_telepon,
                ]);
            } else {
                // Jika belum ada data orang tua, buat baru
                data_orang_tua::create([
                    'user_id'        => $siswa->user_id,
                    'siswa_id'       => $siswa->id,
                    'nama_orang_tua' => $request->nama_orang_tua,
                    'nomor_telepon'  => $request->nomor_telepon,
                ]);
            }
            
            DB::commit();
            
            return redirect()->route('admin.datasiswa')
                ->with('success', 'Data siswa berhasil diperbarui!');
            
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // ============================================
    // DELETE DATA SISWA
    // ============================================
    public function deleteSiswa($id)
    {
        DB::beginTransaction();
        
        try {
            $siswa = Data_siswa::findOrFail($id);
            
            // Hapus data orang tua terlebih dahulu (karena foreign key)
            data_orang_tua::where('siswa_id', $siswa->id)->delete();
            
            // Hapus data siswa
            $siswa->delete();
            
            DB::commit();
            
            return redirect()->route('admin.datasiswa')
                ->with('success', 'Data siswa berhasil dihapus!');
            
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Get Notifikasi (untuk modal)
    public function getNotifikasi()
    {
        $dataSiswaPending = Data_siswa::with('user')
            ->where('status_approval', 'pending')
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
            $siswa = Data_siswa::findOrFail($id);
            
            if ($siswa->status_approval !== 'pending') {
                return back()->with('error', 'Data sudah diproses sebelumnya!');
            }
            
            $siswa->update([
                'status_approval' => 'approved',
                'status' => 'aktif',
                'approved_at' => Carbon::now()
            ]);
            
            DB::commit();
            
            return back()->with('success', 'Data siswa "' . ($siswa->nama_siswa ?? '') . '" berhasil disetujui!');
            
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
            $siswa = Data_siswa::findOrFail($id);
            
            $siswa->update([
                'status_approval' => 'rejected',
                'alasan_penolakan' => $request->alasan_penolakan
            ]);
            
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