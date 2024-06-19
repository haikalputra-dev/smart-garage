<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Landing page
// Route::get('/', [AdminController::class, 'landing'])->name('landing');
Route::get('/', function () {
    return view('front.index');
});

// Authentication routes
Auth::routes();

// Admin routes
Route::middleware(['auth', 'cekRole:Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // List Staff
    Route::get('/admin/master-staff', [AdminController::class, 'indexStaff'])->name('admin.masterStaff');
    // Create Staff
    Route::get('/admin/master-staff/create', [AdminController::class, 'createStaff'])->name('admin.masterStaff.create');
    Route::post('/admin/master-staff', [AdminController::class, 'storeStaff'])->name('admin.masterStaff.store');
    // Edit Staff
    Route::get('/admin/master-staff/{id}/edit', [AdminController::class, 'editStaff'])->name('admin.masterStaff.edit');
    Route::put('/admin/master-staff/{id}', [AdminController::class, 'updateStaff'])->name('admin.masterStaff.update');
    // Delete Staff
    Route::delete('/admin/master-staff/{id}', [AdminController::class, 'destroyStaff'])->name('admin.masterStaff.destroy');

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
});

// // Staff routes
// Route::middleware(['auth', 'cekRole:Staff'])->group(function () {
//     Route::get('/staff', function () {
//         return view('staff.dashboard');
//     })->name('staff.dashboard');
// });

// // Pengguna routes
// Route::middleware(['auth', 'cekRole:Pengguna'])->group(function () {
//     Route::get('/pengguna', function () {
//         return view('pengguna.dashboard');
//     })->name('pengguna.dashboard');
// });