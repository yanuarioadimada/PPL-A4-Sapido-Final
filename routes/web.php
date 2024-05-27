<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\KelahiranKematianController as AdminKelahiranKematianController;
use App\Http\Controllers\Admin\KonsultasiController as AdminKonsultasiController;
use App\Http\Controllers\admin\PenyakitController as AdminPenyakitController;
use App\Http\Controllers\admin\TumbuhKembangController as AdminTumbuhKembangController;
use App\Http\Controllers\BimtekController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\KelahiranKematianController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TumbuhKembangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','role:admin')->group(function () {
    Route::resource('/dashboard/hewan', HewanController::class);
    Route::resource('/dashboard/akun', AccountController::class);
    Route::get('/dashboard/tumbuh/proses', [AdminTumbuhKembangController::class, 'proses'])->name('admin.tumbuh.proses');
    Route::get('/dashboard/tumbuh/riwayat', [AdminTumbuhKembangController::class, 'riwayat'])->name('admin.tumbuh.riwayat');
    Route::patch('/dashboard/tumbuh/proses/{id}', [AdminTumbuhKembangController::class, 'update'])->name('admin.tumbuh.update');

    Route::get('/dashboard/penyakit/proses', [AdminPenyakitController::class, 'proses'])->name('admin.penyakit.proses');
    Route::get('/dashboard/penyakit/riwayat', [AdminPenyakitController::class, 'riwayat'])->name('admin.penyakit.riwayat');
    Route::patch('/dashboard/penyakit/proses/{id}', [AdminPenyakitController::class, 'update'])->name('admin.penyakit.update');

    Route::get('/dashboard/kelahiran-kematian/proses', [AdminKelahiranKematianController::class, 'proses'])->name('admin.kelahiran-kematian.proses');
    Route::get('/dashboard/kelahiran-kematian/riwayat', [AdminKelahiranKematianController::class, 'riwayat'])->name('admin.kelahiran-kematian.riwayat');
    Route::patch('/dashboard/kelahiran-kematian/proses/{id}', [AdminKelahiranKematianController::class, 'update'])->name('admin.kelahiran-kematian.update');

    Route::resource('/dashboard/dokter', DokterController::class);
    Route::get('/dashboard/konsultasi/proses', [AdminKonsultasiController::class, 'proses'])->name('admin.konsultasi.proses');
    Route::get('/dashboard/konsultasi/riwayat', [AdminKonsultasiController::class, 'riwayat'])->name('admin.konsultasi.riwayat');
    Route::patch('/dashboard/konsultasi/proses/{id}', [AdminKonsultasiController::class, 'update'])->name('admin.konsultasi.update');

    Route::get('/dashboard/pendaftar/proses', [PendaftarController::class, 'proses'])->name('admin.pendaftar.proses');
    Route::get('/dashboard/pendaftar/riwayat', [PendaftarController::class, 'riwayat'])->name('admin.pendaftar.riwayat');
    Route::patch('/dashboard/pendaftar/proses/{id}', [PendaftarController::class, 'update'])->name('admin.pendaftar.update');

    Route::get('/dashboard/bimtek', [BimtekController::class, 'index'])->name('admin.bimtek.index');
    Route::get('/dashboard/bimtek/create', [BimtekController::class, 'create'])->name('admin.bimtek.create');
    Route::get('/dashboard/bimtek/show/{id}', [BimtekController::class, 'show'])->name('admin.bimtek.show');
    Route::post('/dashboard/bimtek', [BimtekController::class, 'store'])->name('admin.bimtek.store');
    Route::get('/dashboard/bimtek/edit/{id}', [BimtekController::class, 'edit'])->name('admin.bimtek.edit');
    Route::patch('/dashboard/bimtek/status/{id}', [BimtekController::class, 'updateStatus'])->name('admin.bimtek.update.status');
    Route::patch('/dashboard/bimtek/{id}', [BimtekController::class, 'update'])->name('admin.bimtek.update');
    Route::get('/dashboard/bimtek/peserta', [BimtekController::class, 'peserta'])->name('admin.bimtek.peserta');

    
});

Route::middleware('auth','role:admin|user')->group(function () {
    Route::resource('/dashboard/tumbuh', TumbuhKembangController::class);
    Route::resource('/dashboard/penyakit', PenyakitController::class);
    Route::resource('dashboard/kelahiran-kematian', KelahiranKematianController::class);
    Route::resource('/dashboard/konsultasi', KonsultasiController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);
    Route::resource('/dashboard/profile', ProfileController::class)->only(['index', 'edit', 'update', 'destroy']);
});



Route::get('/bimtek', [BimtekController::class, 'konten'])->name('bimtek.konten');
Route::get('/bimtek/regis/{id}', [BimtekController::class, 'regis'])->name('bimtek.regis');
Route::post('/bimtek/daftar', [BimtekController::class, 'daftar'])->name('bimtek.daftar');

Route::post('/register',[PendaftarController::class, 'store'])->name('register.store');

Route::get('/register', function () {
    return view('pendaftar.index');
})->name('register');

require __DIR__.'/auth.php';

