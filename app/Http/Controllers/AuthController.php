<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    // Tampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

     // PROSES REGISTER
    public function register(Request $request)
    {
        $userData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $userData['password'] = Hash::make($userData['password']);

        // SIMPAN USER
        $user = User::create($userData);
        // LOGIN USER  
        
        // LOGIN ULANG
        return redirect()->route(route: 'login');
    }

    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function lengkapi1()
    {
        return view('auth.lengkapi1');
    }

    public function lengkapi2()
    {
        return view('auth.lengkapi2');
    }

    // Proses login
    public function login(Request $request): RedirectResponse
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // amankan session

             $user = Auth::user();

            // Jika belum melengkapi data, arahkan ke form kelengkapan
            if (!$user->is_completed) {
                return redirect()->route('lengkapi1');
            }

            // Kalau sudah lengkap, langsung ke dashboard
            return redirect()->intended('/');
        }

        // Jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function submitLengkapiData(Request $request)
{
    $request->validate([
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        // tambah validasi sesuai form kamu
    ]);

    $user = Auth::user();
    $user->alamat = $request->alamat;
    $user->telepon = $request->telepon;
    $user->is_completed = true; // tandai sudah lengkap
    $user->save();

    return redirect('/')->with('success', 'Data berhasil dilengkapi!');
}


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}