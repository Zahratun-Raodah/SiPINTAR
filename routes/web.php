<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PersensiController;
use App\Http\Controllers\backend\JurnalController;
use App\Http\Controllers\backend\SiswaController;
use App\Http\Controllers\backend\GuruController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ProfilController;
use App\Http\Controllers\backend\MapelController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return 'Hello from Railway!';
});

Route::get('/', [LandingPageController::class, 'index'])->name('page');

// Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('login.admin');
// Route::get('/login/guru', [AuthController::class, 'showLoginGuru'])->name('login.guru');

Route::get('/login', [AuthController::class, 'index'])->name('show_login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['checkGuruOrAdmin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'read'])->name('dashboard');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
        Route::get('/siswa/tambah', [SiswaController::class, 'create'])->name('siswa.tambah');
        Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
        Route::get('/siswa/search', [SiswaController::class, 'sharching'])->name('siswa.search');
        Route::get('/siswa/filter', [SiswaController::class, 'filter'])->name('siswa.filter');
        Route::get('/siswa/detail/{id}', [SiswaController::class, 'show'])->name('siswa.show');

        Route::get('/guru', [GuruController::class, 'index'])->name('guru');
        Route::get('/guru/tambah', [GuruController::class, 'create'])->name('guru.tambah');
        Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
        Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
        Route::put('/guru/update/{id}',  [GuruController::class, 'update'])->name('guru.update');
        Route::delete('/guru/destroy/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
        Route::get('/guru/detail/{id}', [GuruController::class, 'show'])->name('guru.show');

        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/tambah', [AdminController::class, 'create'])->name('admin.tambah');
        Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

        Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
        Route::get('/profil/tambah', [ProfilController::class, 'create'])->name('profil.tambah');
        Route::post('/profil/store', [ProfilController::class, 'store'])->name('profil.store');
        Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
        Route::get('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
        Route::get('/profil/detail', [ProfilController::class, 'show'])->name('profil.show');

        Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
        Route::get('/mapel/tambah', [MapelController::class, 'create'])->name('mapel.tambah');
        Route::post('/mapel/store', [MapelController::class, 'store'])->name('mapel.store');
        Route::get('/mapel/edit/{id}', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::put('/mapel/update/{id}', [MapelController::class, 'update'])->name('mapel.update');
        Route::delete('/mapel/destroy/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');

    });

    Route::get('/persensi', [PersensiController::class, 'index'])->name('persensi');
    Route::get('/persensi/tambah', [PersensiController::class, 'create'])->name('persensi.tambah');
    Route::post('/persensi/store', [PersensiController::class, 'store'])->name('persensi.store');
    Route::get('/export-absensi/{kelas?}', [PersensiController::class, 'exportPdf'])->name('export.absensi');
    Route::get('/persensi/search', [PersensiController::class, 'sharching'])->name('persensi.search');
    Route::get('/persensi/filter', [PersensiController::class, 'filter'])->name('persensi.filter');
    Route::get('/persensi/filterLaporan', [PersensiController::class, 'filterLaporan'])->name('persensi.filterLaporan');
    Route::get('/persensi/show/{kelas}/{id_mapel}', [PersensiController::class, 'show'])->name('persensi.show');
    Route::post('/persensi/send/{kelas}/{id_mapel}', [PersensiController::class, 'send'])->name('persensi.send');
    Route::get('/persensi/ShowAbsen', [PersensiController::class, 'ShowAbsen'])->name('persensi.ShowAbsen');
    Route::get('/persensi/showLaporan', [PersensiController::class, 'showLaporan'])->name('persensi.showLaporan');
    Route::get('/persensi/edit', [PersensiController::class, 'edit'])->name('persensi.edit');
    Route::put('/persensi/update', [PersensiController::class, 'update'])->name('persensi.update');

    Route::get('/jurnal', [JurnalController::class, 'index'])->name('jurnal');
    Route::get('/jurnal/tambah', [JurnalController::class, 'create'])->name('jurnal.tambah');
    Route::post('/jurnal/store', [JurnalController::class, 'store'])->name('jurnal.store');
    Route::get('/jurnal/edit/{id}', [JurnalController::class, 'edit'])->name('jurnal.edit');
    Route::put('/jurnal/update/{id}', [JurnalController::class, 'update'])->name('jurnal.update');
    Route::get('/jurnal/preview', [JurnalController::class, 'showPdf'])->name('jurnal.preview');
    Route::get('/export-jurnal', [JurnalController::class, 'exportPdf'])->name('export.jurnal');
});
