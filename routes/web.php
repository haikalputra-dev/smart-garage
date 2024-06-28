<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GarasiController;
use App\Http\Controllers\SensorController;

Route::get('/', [HomeController::class, 'landing'])->name('landing');


Route::get('/logins', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logins', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logs', [AdminController::class, 'fetchLogs'])->name('logs.fetch');

// Admin routes
Route::middleware(['auth', 'cekRole:Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/log-garasi', [AdminController::class, 'logGarasi'])->name('admin.logGarasi');

    /////////////////////STAFF/////////////////////
    // List Staff
    Route::get('/admin/master-staff', [AdminController::class, 'indexStaff'])->name('admin.masterStaff');
    // Create Staff
    Route::get('/admin/master-staff/create', [AdminController::class, 'createStaff'])->name('admin.masterStaff.create');
    Route::post('/admin/master-staff', [AdminController::class, 'storeStaff'])->name('admin.masterStaff.store');
    // Edit Staff
    Route::get('/admin/master-staff/{id}/edit', [AdminController::class, 'editStaff'])->name('admin.masterStaff.edit');
    Route::put('/admin/master-staff/{id}', [AdminController::class, 'updateUser'])->name('admin.masterStaff.update');
    // Delete Staff
    Route::delete('/admin/master-staff/{id}', [AdminController::class, 'destroyStaff'])->name('admin.masterStaff.destroy');

    /////////////////////PELANGGAN/////////////////////

    // List Pelanggan
    Route::get('/admin/master-pelanggan', [AdminController::class, 'indexPelanggan'])->name('admin.masterPelanggan');
    // Create Pelanggan
    Route::get('/admin/master-pelanggan/create', [AdminController::class, 'createPelanggan'])->name('admin.masterPelanggan.create');
    Route::post('/admin/master-pelanggan', [AdminController::class, 'storePelanggan'])->name('admin.masterPelanggan.store');
    // Edit Pelanggan
    Route::get('/admin/master-pelanggan/{id}/edit', [AdminController::class, 'editPelanggan'])->name('admin.masterPelanggan.edit');
    Route::put('/admin/master-pelanggan/{id}', [AdminController::class, 'updateUser'])->name('admin.masterPelanggan.update');
    // Delete Pelanggan
    Route::delete('/admin/master-pelanggan/{id}', [AdminController::class, 'destroyPelanggan'])->name('admin.masterPelanggan.destroy');

    /////////////////////GARASI/////////////////////
    // List Garasi
    Route::get('/admin/master-garasi', [AdminController::class, 'indexGarasi'])->name('admin.masterGarasi');
    // Create Garasi
    Route::get('/admin/master-garasi/create', [AdminController::class, 'createGarasi'])->name('admin.masterGarasi.create');
    Route::post('/admin/master-garasi', [AdminController::class, 'storeGarasi'])->name('admin.masterGarasi.store');
    // Edit Garasi
    Route::get('/admin/master-garasi/{id}/edit', [AdminController::class, 'editGarasi'])->name('admin.masterGarasi.edit');
    Route::put('/admin/master-garasi/{id}', [AdminController::class, 'updateGarasi'])->name('admin.masterGarasi.update');
    // Delete Garasi
    Route::delete('/admin/master-garasi/{id}', [AdminController::class, 'destroyGarasi'])->name('admin.masterGarasi.destroy');


    Route::get('/admin/transaksi', [AdminController::class, 'transaksi'])->name('admin.transaksi');
    Route::get('/admin/riwayat-transaksi', [AdminController::class, 'riwayatTransaksi'])->name('admin.riwayatTransaksi');

    Route::post('/confirm-payment', [GarasiController::class, 'confirmPayment'])->name('confirmPayment');
    Route::post('/cancel-payment', [GarasiController::class, 'cancelPayment'])->name('cancelPayment');
    Route::post('/complete-rental', [GarasiController::class, 'completeRental'])->name('completeRental');
});

// Admin routes
Route::middleware(['auth', 'cekRole:Staff'])->group(function () {
    Route::get('/staff', [AdminController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/staff/log-garasi', [AdminController::class, 'logGarasi'])->name('staff.logGarasi');
    Route::get('/logs', [AdminController::class, 'fetchLogs'])->name('logs.fetch');

    /////////////////////PELANGGAN/////////////////////

    // List Pelanggan
    Route::get('/staff/master-pelanggan', [AdminController::class, 'indexPelanggan'])->name('staff.masterPelanggan');
    // Create Pelanggan
    Route::get('/staff/master-pelanggan/create', [AdminController::class, 'createPelanggan'])->name('staff.masterPelanggan.create');
    Route::post('/staff/master-pelanggan', [AdminController::class, 'storePelanggan'])->name('staff.masterPelanggan.store');
    // Edit Pelanggan
    Route::get('/staff/master-pelanggan/{id}/edit', [AdminController::class, 'editPelanggan'])->name('staff.masterPelanggan.edit');
    Route::put('/staff/master-pelanggan/{id}', [AdminController::class, 'updateUser'])->name('staff.masterPelanggan.update');
    // Delete Pelanggan
    Route::delete('/staff/master-pelanggan/{id}', [AdminController::class, 'destroyPelanggan'])->name('staff.masterPelanggan.destroy');

    /////////////////////GARASI/////////////////////
    // List Garasi
    Route::get('/staff/master-garasi', [AdminController::class, 'indexGarasi'])->name('staff.masterGarasi');
    // Create Garasi
    Route::get('/staff/master-garasi/create', [AdminController::class, 'createGarasi'])->name('staff.masterGarasi.create');
    Route::post('/staff/master-garasi', [AdminController::class, 'storeGarasi'])->name('staff.masterGarasi.store');
    // Edit Garasi
    Route::get('/staff/master-garasi/{id}/edit', [AdminController::class, 'editGarasi'])->name('staff.masterGarasi.edit');
    Route::put('/staff/master-garasi/{id}', [AdminController::class, 'updateGarasi'])->name('staff.masterGarasi.update');
    // Delete Garasi
    Route::delete('/staff/master-garasi/{id}', [AdminController::class, 'destroyGarasi'])->name('staff.masterGarasi.destroy');


    Route::get('/staff/transaksi', [AdminController::class, 'transaksi'])->name('staff.transaksi');
    Route::get('/staff/riwayat-transaksi', [AdminController::class, 'riwayatTransaksi'])->name('staff.riwayatTransaksi');

    Route::post('/confirm-payment', [GarasiController::class, 'confirmPayment'])->name('confirmPayment');
    Route::post('/cancel-payment', [GarasiController::class, 'cancelPayment'])->name('cancelPayment');
    Route::post('/complete-rental', [GarasiController::class, 'completeRental'])->name('completeRental');
});


Route::get('/sensor-suhu/{nilaisuhu}',[SensorController::class,'simpandata']);
Route::get('/sensor-pintu/{status}',[SensorController::class,'log']);
Route::get('/suhu',[SensorController::class,'getSuhu']);
Route::get('/log',[SensorController::class,'getLog']);

// Pelanggan routes
Route::middleware(['auth', 'cekRole:Pelanggan'])->group(function () {
    Route::get('/profil',[AuthController::class,'profilPengguna'])->name('profil.pengguna');

    Route::get('/cek-garasi', [GarasiController::class, 'cekGarasi'])->name('cek.garasi');
    Route::get('/cek-garasi/{lokasi}',[GarasiController::class,'cekGarasiDetail'])->name('cek.garasiDetail');
    Route::get('/book-garasi/{id}', [GarasiController::class, 'bookGarasi'])->name('book.garasi');
    Route::post('/book-garasi/checkout',[GarasiController::class, 'transaksiGarasi'])->name('pesan.garasi');
    Route::get('/detail-transaksi/{id_pembayaran}',[GarasiController::class, 'detailTransaksi'])->name('detail.transaksi');
    Route::post('/cancel-pesan', [GarasiController::class, 'cancelPayment'])->name('cancelPesan');
});