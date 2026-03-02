<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\data_siswa;
use App\Models\data_orang_tua;
use Illuminate\Http\RedirectResponse;

class UserAuthController extends Controller
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

            // Jika user adalah admin, logout dari guard web dan login via guard admin
            if ($user->role === 'admin') {
                Auth::guard('web')->logout();
                Auth::guard('admin')->login($user, $request->boolean('remember'));
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }

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

    public function submitLengkapi1(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'kelas' => 'required|string',
        ]);

        data_siswa::create([
            'user_id' => Auth::id(),
            'nama_siswa' => $request->nama_lengkap,
            'nik_siswa' => $request->nik,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'kelas' => $request->kelas,
        ]);

    return redirect()->route('lengkapi2.form');
    }

        public function submitLengkapi2(Request $request)
    {
        $request->validate([
            'nama_wali' => 'required|string|max:255',
            'nik_wali' => 'required|string|max:255',
            'alamat_wali' => 'required|string|max:255',
            'nomor_telepon_wali' => 'required|string|max:15',
            'agama_wali' => 'required|string|max:20',
            'pekerjaan_wali' => 'required|string|max:50',
            'peran_wali' => 'required|string|max:50',
        ]);

        $siswa_id = data_siswa::where('user_id', Auth::id())->first()->id;

        data_orang_tua::create([
            'user_id' => Auth::id(),
            'siswa_id' => $siswa_id,
            'nama_orang_tua' => $request->nama_wali,
            'nik_orang_tua' => $request->nik_wali,
            'alamat_orang_tua' => $request->alamat_wali,
            'nomor_telepon' => $request->nomor_telepon_wali,
            'agama_orang_tua' => $request->agama_wali,
            'pekerjaan' => $request->pekerjaan_wali,
            'peran_wali' => $request->peran_wali,
        ]);

        $user = Auth::user();
        $user->is_completed = true;
        $user->save();

        return redirect()->route('waiting.room')->with('success', 'Data berhasil dilengkapi!');
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