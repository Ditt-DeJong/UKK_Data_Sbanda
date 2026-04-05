<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        // Data dummy untuk sekarang, nanti bisa ganti dengan data dari database
        $data = [
            'total_siswa' => 34,
            'izin_pending' => 3,
            'data_terverifikasi' => 31,
            'admin' => $admin,
        ];

        return view('admin.dashboard', $data);
    }

    public function kelolaIzin()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.kelola_izin');
    }

    public function datasiswa()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.datasiswa');
    }

    public function kehadiransiswa()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.kehadiransiswa');
    }
}
