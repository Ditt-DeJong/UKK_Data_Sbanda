<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataOrangTua;
use App\Models\DataSiswa;
use App\Models\Izin;
use App\Models\User;
use App\Services\WhatsAppService;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboard()
    {
        $totalSiswa = DataSiswa::count();
        $dataPending = DataSiswa::where('status_approval', 'pending')->count();
        $dataVerified = DataSiswa::where('status_approval', 'approved')->count();

        $izins = Izin::with('siswa')->latest()->get();

        $siswaList = DataSiswa::with(['user', 'orangTua'])
            ->latest()
            ->take(5)
            ->get();

        $dataSiswaPending = DataSiswa::with(['user', 'orangTua'])
            ->where('status_approval', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        $notifCount = $dataSiswaPending->count();

        return view('admin.dashboard', compact(
            'totalSiswa',
            'dataPending',
            'dataVerified',
            'siswaList',
            'izins',
            'dataSiswaPending',
            'notifCount'
        ));
    }

    // Data Siswa
    public function dataSiswa()
    {
        $siswaList = DataSiswa::with(['user', 'orangTua'])
            ->orderBy('created_at', 'desc')
            ->get();

        $dataSiswaPending = DataSiswa::with(['user', 'orangTua'])
            ->where('status_approval', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        // Statistik (case-insensitive comparison)
        $totalSiswa = $siswaList->count();
        $siswaAktif = $siswaList->filter(fn ($s) => strtolower($s->status) === 'aktif')->count();
        $siswaPending = $siswaList->filter(fn ($s) => strtolower($s->status) === 'pending')->count();

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
                'email' => strtolower(str_replace(' ', '', $request->nama_siswa)).rand(100, 999).'@mail.com',
                'password' => bcrypt('password123'),
                'is_completed' => true,
            ]);

            // simpan siswa
            $siswa = DataSiswa::create([
                'user_id' => $user->id,
                'nik_siswa' => $request->nik_siswa,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur' => $request->umur,
                'kelas' => $request->kelas,
                'status' => $request->status,
                'status_approval' => 'approved',
                'approved_at' => Carbon::now(),
            ]);

            // simpan orang tua (opsional)
            DataOrangTua::create([
                'user_id' => $user->id,
                'siswa_id' => $siswa->id,
                'nama_orang_tua' => $request->nama_orang_tua,
                'nomor_telepon' => $request->nomor_telepon,
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
            'nik_siswa' => 'required|string|max:20|unique:data_siswa,nik_siswa,'.$id,
            'umur' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kelas' => 'required|string|max:20',
            'status' => 'required|string|max:15',

            // Data Orang Tua
            'nama_orang_tua' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:20',
        ]);

        DB::beginTransaction();

        try {
            $siswa = DataSiswa::findOrFail($id);

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
            $orangTua = DataOrangTua::where('siswa_id', $siswa->id)->first();

            if ($orangTua) {
                $orangTua->update([
                    'nama_orang_tua' => $request->nama_orang_tua,
                    'nomor_telepon' => $request->nomor_telepon,
                ]);
            } else {
                // Jika belum ada data orang tua, buat baru
                DataOrangTua::create([
                    'user_id' => $siswa->user_id,
                    'siswa_id' => $siswa->id,
                    'nama_orang_tua' => $request->nama_orang_tua,
                    'nomor_telepon' => $request->nomor_telepon,
                ]);
            }

            DB::commit();

            return redirect()->route('admin.datasiswa')
                ->with('success', 'Data siswa berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()
                ->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    // ============================================
    // DELETE DATA SISWA
    // ============================================
    public function deleteSiswa($id)
    {
        DB::beginTransaction();

        try {
            $siswa = DataSiswa::findOrFail($id);

            // Hapus data orang tua terlebih dahulu (karena foreign key)
            DataOrangTua::where('siswa_id', $siswa->id)->delete();

            // Hapus data siswa
            $siswa->delete();

            DB::commit();

            return redirect()->route('admin.datasiswa')
                ->with('success', 'Data siswa berhasil dihapus!');

        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    // Get Notifikasi (untuk modal)
    public function getNotifikasi()
    {
        $dataSiswaPending = DataSiswa::with('user')
            ->where('status_approval', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        $totalPending = $dataSiswaPending->count();

        return response()->json([
            'data' => $dataSiswaPending,
            'total' => $totalPending,
        ]);
    }

    // Approve Data Siswa
    public function approveDataSiswa(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $siswa = DataSiswa::findOrFail($id);

            if ($siswa->status_approval !== 'pending') {
                return back()->with('error', 'Data sudah diproses sebelumnya!');
            }

            $siswa->update([
                'status_approval' => 'approved',
                'status' => 'aktif',
                'approved_at' => Carbon::now(),
            ]);

            DB::commit();

            return back()->with('success', 'Data siswa "'.($siswa->nama_siswa ?? '').'" berhasil disetujui!');

        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    // Reject Data Siswa
    public function rejectDataSiswa(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:500',
        ]);

        DB::beginTransaction();

        try {
            $siswa = DataSiswa::findOrFail($id);

            $siswa->update([
                'status_approval' => 'rejected',
                'alasan_penolakan' => $request->alasan_penolakan,
            ]);

            DB::commit();

            return back()->with('success', 'Data siswa berhasil ditolak!');

        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    // Kehadiran Siswa (Board View)
    public function kehadiran(Request $request)
    {
        $tanggal = $request->query('tanggal', Carbon::today()->toDateString());
        $status = $request->query('status', '');
        $search = $request->query('search', '');

        // 1. Ambil SEMUA Siswa yang sudah approved (Source of Truth)
        $siswaQuery = DataSiswa::with('orangTua')
            ->where('status_approval', 'approved')
            ->orderBy('nama_siswa', 'asc');

        if ($search) {
            $siswaQuery->where(function($q) use ($search) {
                $q->where('nama_siswa', 'like', "%$search%")
                  ->orWhere('nik_siswa', 'like', "%$search%");
            });
        }

        $listSiswa = $siswaQuery->get();

        // 2. Ambil data kehadiran untuk tanggal tersebut
        $dataKehadiran = \App\Models\Kehadiran::whereDate('tanggal', $tanggal)
            ->get()
            ->keyBy('user_id');

        // 3. Gabungkan data (Siswa + Kehadiran)
        $kehadiran = $listSiswa->map(function ($siswa) use ($dataKehadiran) {
            $record = $dataKehadiran->get($siswa->user_id);

            // Build WA link ke orang tua jika status ALPHA
            $nomorOrangTua = $siswa->orangTua->nomor_telepon ?? null;
            $linkWaOrangTua = null;
            if ($nomorOrangTua) {
                $nomor = preg_replace('/[^0-9]/', '', $nomorOrangTua);
                if (substr($nomor, 0, 1) === '0') {
                    $nomor = '62' . substr($nomor, 1);
                }
                $pesan = urlencode(
                    "Assalamualaikum Bapak/Ibu Orang Tua dari *{$siswa->nama_siswa}*,\n\n" .
                    "Kami informasikan bahwa putra/putri Bapak/Ibu hari ini berstatus *ALPHA* (Tidak Hadir tanpa keterangan).\n\n" .
                    "Mohon segera login ke Portal Orang Tua dan ajukan Izin atau Surat Sakit jika memang berhalangan hadir.\n\n" .
                    "Terima kasih,\nAdmin Sbanda."
                );
                $linkWaOrangTua = "https://wa.me/{$nomor}?text={$pesan}";
            }

            return (object) [
                'id'              => $record->id ?? null,
                'user_id'         => $siswa->user_id,
                'siswa'           => $siswa,
                'status'          => $record->status ?? 'BELUM_DIABSEN',
                'keterangan'      => $record->keterangan ?? '',
                'waktu'           => $record ? Carbon::parse($record->created_at)->format('H:i') : null,
                'link_wa_ortu'    => $linkWaOrangTua,
            ];
        });

        // 4. Filter berdasarkan status jika ada
        if ($status) {
            $kehadiran = $kehadiran->filter(function($item) use ($status) {
                return strtolower($item->status) === strtolower($status);
            });
        }

        // Statistik Dashboard
        $totalSiswa = $listSiswa->count();
        $countHadir = $dataKehadiran->where('status', 'HADIR')->count();
        $countIzin = $dataKehadiran->where('status', 'IZIN')->count();
        $countSakit = $dataKehadiran->where('status', 'SAKIT')->count();
        $countAlpha = $dataKehadiran->where('status', 'ALPHA')->count();

        $dataSiswaPending = DataSiswa::with(['user', 'orangTua'])
            ->where('status_approval', 'pending')
            ->get();
        $notifCount = $dataSiswaPending->count();

        return view('admin.kehadiransiswa', compact(
            'kehadiran',
            'totalSiswa',
            'countHadir',
            'countIzin',
            'countSakit',
            'countAlpha',
            'tanggal',
            'status',
            'search',
            'dataSiswaPending',
            'notifCount'
        ));
    }

    // Update Kehadiran Manual (Update or Create)
    public function updateKehadiran(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:HADIR,IZIN,SAKIT,ALPHA',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $kehadiran = \App\Models\Kehadiran::updateOrCreate(
            ['user_id' => $request->user_id, 'tanggal' => $request->tanggal],
            ['status' => $request->status, 'keterangan' => $request->keterangan]
        );

        // Load relations for WA logic
        $kehadiran->load('user.dataSiswa', 'user.dataOrangTua');

        // Send WA jika guru manual menjatuhkan ALPHA
        if ($request->status === 'ALPHA') {
            $user = $kehadiran->user;
            $orangTua = $user->dataOrangTua;

            if ($orangTua && $orangTua->nomor_telepon) {
                $namaSiswa = $user->dataSiswa->nama_siswa ?? 'Siswa SBANDA';
                $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
                WhatsAppService::sendAlphaNotification($orangTua->nomor_telepon, $namaSiswa, $tanggal);
            }
        }

        return redirect()->back()->with('success', 'Status kehadiran berhasil diperbarui!');
    }

    // Bulk Hadir (Tandai Berangkat Semua)
    public function bulkHadir(Request $request)
    {
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());
        
        $siswaApproved = DataSiswa::where('status_approval', 'approved')->get();

        $count = 0;
        foreach ($siswaApproved as $siswa) {
            $exists = \App\Models\Kehadiran::where('user_id', $siswa->user_id)
                ->whereDate('tanggal', $tanggal)
                ->exists();

            if (!$exists) {
                \App\Models\Kehadiran::create([
                    'user_id' => $siswa->user_id,
                    'tanggal' => $tanggal,
                    'status' => 'HADIR',
                    'keterangan' => 'Tepat Waktu'
                ]);
                $count++;
            }
        }

        return redirect()->back()->with('success', "$count siswa berhasil ditandai masuk.");
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
