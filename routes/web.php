<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;

// ============================================
// USER ROUTES
// ============================================

// Guest Routes (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [UserAuthController::class, 'register'])->name('register');
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [UserAuthController::class, 'login'])->name('login');
});

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    // Lengkapi Data
    Route::get('/lengkapi1', [UserAuthController::class, 'lengkapi1'])->name('lengkapi1');
    Route::post('/lengkapi1', [UserAuthController::class, 'submitLengkapi1'])->name('lengkapi1.submit');
    Route::get('/lengkapi2', [UserAuthController::class, 'lengkapi2'])->name('lengkapi2.form');
    Route::post('/lengkapi2', [UserAuthController::class, 'submitLengkapi2'])->name('lengkapi2.submit');
    
    // Main Pages
    Route::get('/', [MainController::class, 'kehadiran'])->name('kehadiran');
    Route::get('/ajukanizin', [MainController::class, 'ajukanizin'])->name('ajukanizin');
    Route::get('/jadwalkelas', [MainController::class, 'jadwalkelas'])->name('jadwalkelas');
    
    // Logout
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
});

// Testing Routes
Route::get('/page2', function(){
    return view('welcome');
});

Route::get('/tes', function(){
    return view('website.tes');
});

Route::get('page2/{id}', function($id){
    return view('website.id', [
        'no' => $id
    ]);
});

// ============================================
// ADMIN ROUTES
// ============================================

// Admin Login (guest admin)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginAdminForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'loginAdmin'])->name('login.submit');
});

// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Data Siswa
    Route::get('/datasiswa', [AdminController::class, 'dataSiswa'])->name('datasiswa');
    
    // Notifikasi & Approval
    Route::get('/notifikasi', [AdminController::class, 'getNotifikasi'])->name('notifikasi');
    Route::post('/approve-siswa/{id}', [AdminController::class, 'approveDataSiswa'])->name('approve.siswa');
    Route::post('/reject-siswa/{id}', [AdminController::class, 'rejectDataSiswa'])->name('reject.siswa');
    
    // Kehadiran Siswa
    Route::get('/kehadiransiswa', function() {
        return view('admin.kehadiransiswa');
    })->name('kehadiransiswa');
    
    // Kelola Izin
    Route::get('/kelola-izin', function() {
        return view('admin.kelola_izin');
    })->name('kelola_izin');
    
    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logoutAdmin'])->name('logout');
});