<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{
    public function index()
    {
        $data = Kehadiran::where('user_id', Auth::id())
                         ->orderBy('tanggal', 'desc')
                         ->take(5)
                         ->get();

        return view('website.kehadiran', compact('data'));
    }
}
