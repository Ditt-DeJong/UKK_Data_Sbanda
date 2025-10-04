<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [MainController::class, 'kehadiran'])->name('kehadiran')->middleware(middleware: 'auth');
Route::get('/ajukanizin', [MainController::class, 'ajukanizin'])->name('ajukanizin');
Route::get('/jadwalkelas', [MainController::class, 'jadwalkelas'])->name('jadwalkelas');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/lengkapi1', [AuthController::class, 'lengkapi1'])->name('lengkapi1');
Route::get('/lengkapi2', [AuthController::class, 'lengkapi2'])->name('lengkapi2');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
