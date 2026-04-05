<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IzinController;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\User\UserAuthController;
use Illuminate\Support\Facades\Route;

// ============================================
// LANDING PAGE (Public)
// ============================================

Route::get('/landing', function () {
    if (auth()->check()) {
        return redirect()->route('kehadiran');
    }

    return view('landing');
})->name('landing');

// ============================================
// USER ROUTES
// ============================================

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [UserAuthController::class, 'register'])->name('register');
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [UserAuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    // Route untuk melengkapi data (tidak perlu profile.complete)
    Route::get('/lengkapi1', [UserAuthController::class, 'lengkapi1'])->name('lengkapi1');
    Route::post('/lengkapi1', [UserAuthController::class, 'submitLengkapi1'])->name('lengkapi1.submit');
    Route::get('/lengkapi2', [UserAuthController::class, 'lengkapi2'])->name('lengkapi2.form');
    Route::post('/lengkapi2', [UserAuthController::class, 'submitLengkapi2'])->name('lengkapi2.submit');

    // Ruang tunggu
    Route::get('/menunggu', function () {
        return view('auth.waiting_room');
    })->name('waiting.room');

    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
});

// Route yang memerlukan profil lengkap dan absensi otomatis
Route::middleware(['auth', 'profile.complete', 'cek.kehadiran'])->group(function () {
    Route::get('/', [MainController::class, 'kehadiran'])->name('kehadiran');
    Route::get('/ajukanizin', [MainController::class, 'ajukanizin'])->name('ajukanizin');
    Route::post('/ajukanizin', [MainController::class, 'submitIzin'])->name('izin.submit');
    Route::delete('/ajukanizin/{id}', [MainController::class, 'cancelIzin'])->name('izin.cancel');
    Route::get('/jadwalkelas', [MainController::class, 'jadwalkelas'])->name('jadwalkelas');
});

// ============================================
// ADMIN ROUTES
// ============================================

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginAdminForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'loginAdmin'])->name('login.submit');
});

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Data Siswa - CRUD Operations
    Route::get('/datasiswa', [AdminController::class, 'dataSiswa'])->name('datasiswa');
    Route::post('/datasiswa', [AdminController::class, 'storeSiswa'])->name('datasiswa.store');
    Route::put('/datasiswa/update/{id}', [AdminController::class, 'updateSiswa'])
        ->name('datasiswa.update');
    Route::delete('/datasiswa/{id}', [AdminController::class, 'deleteSiswa'])->name('datasiswa.delete');

    // Notifikasi & Approval
    Route::get('/notifikasi', [AdminController::class, 'getNotifikasi'])->name('notifikasi');
    Route::post('/approve-siswa/{id}', [AdminController::class, 'approveDataSiswa'])->name('approve.siswa');
    Route::post('/reject-siswa/{id}', [AdminController::class, 'rejectDataSiswa'])->name('reject.siswa');

    // Kehadiran Siswa
    Route::get('/kehadiransiswa', [AdminController::class, 'kehadiran'])->name('kehadiransiswa');

    // Kelola Izin
    Route::get('/kelola-izin', [IzinController::class, 'index'])->name('kelola_izin');
    Route::post('/kelola-izin/{id}/approve', [IzinController::class, 'approve'])->name('kelola_izin.approve');
    Route::post('/kelola-izin/{id}/reject', [IzinController::class, 'reject'])->name('kelola_izin.reject');

    // Pengumuman
    Route::get('/pengumuman', [\App\Http\Controllers\Admin\PengumumanController::class, 'index'])->name('pengumuman');
    Route::post('/pengumuman', [\App\Http\Controllers\Admin\PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::put('/pengumuman/{id}', [\App\Http\Controllers\Admin\PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::put('/pengumuman/{id}/toggle', [\App\Http\Controllers\Admin\PengumumanController::class, 'toggle'])->name('pengumuman.toggle');
    Route::delete('/pengumuman/{id}', [\App\Http\Controllers\Admin\PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    // Nilai Akademik (Tugas & Ulangan)
    Route::get('/nilai', [\App\Http\Controllers\Admin\NilaiAkademikController::class, 'index'])->name('nilai');
    Route::get('/nilai/siswa/{id}', [\App\Http\Controllers\Admin\NilaiAkademikController::class, 'detailSiswa'])->name('nilai.detail');
    Route::post('/nilai/store', [\App\Http\Controllers\Admin\NilaiAkademikController::class, 'store'])->name('nilai.store');
    Route::delete('/nilai/{id}', [\App\Http\Controllers\Admin\NilaiAkademikController::class, 'destroy'])->name('nilai.destroy');

    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logoutAdmin'])->name('logout');
});
