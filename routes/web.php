<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('admin.login'));

Route::prefix('admin')->name('admin.')->group(function () {

    // hanya untuk yang BELUM login
    Route::middleware('guest:admin')->group(function () {
        Route::get('daftar', [AuthController::class, 'showRegister'])->name('register');
        Route::post('daftar', [AuthController::class, 'register'])->name('register.store');
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.store');
    });

    // hanya untuk yang SUDAH login sebagai admin
    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});

Route::get('/admin/orders', function () {
    return view('admin.orders.index');
})->name('admin.orders.index');