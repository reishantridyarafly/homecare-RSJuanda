<?php

use App\Http\Controllers\Backend\BayarController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DokterController;
use App\Http\Controllers\Backend\GantiPasswordController;
use App\Http\Controllers\Backend\JabatanController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\KotaController;
use App\Http\Controllers\Backend\LayananController;
use App\Http\Controllers\Backend\PasienController;
use App\Http\Controllers\Backend\PelayananController;
use App\Http\Controllers\Backend\PerawatController;
use App\Http\Controllers\Backend\PoliController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\DokterController as FrontendDokterController;
use App\Http\Controllers\Frontend\FisioterapiController;
use App\Http\Controllers\Frontend\PerawatController as FrontendPerawatController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/layanan/perawat', [FrontendPerawatController::class, 'index'])->name('frontend.perawat');
Route::get('/layanan/fisioterapi', [FisioterapiController::class, 'index'])->name('frontend.fisioterapi');

Route::get('/layanan/dokter', [FrontendDokterController::class, 'index'])->name('frontend.dokter');
Route::get('/dokter/detail/{dokter}', [FrontendDokterController::class, 'detail'])->name('frontend.dokter.detail');

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Pasien'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Administrator'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Dokter
    Route::post('/dokter/delete-multiple-dokter', [DokterController::class, 'deleteMultiple'])->name('delete-multiple-dokter');
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::get('/dokter/tambah', [DokterController::class, 'create'])->name('dokter.create');
    Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
    Route::get('/dokter/{dokter}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
    Route::post('/dokter/{dokter}', [DokterController::class, 'update'])->name('dokter.update');
    Route::delete('dokter/{dokter}', [DokterController::class, 'destroy'])->name('dokter.destroy');

    //Perawat
    Route::post('/perawat/delete-multiple-perawat', [PerawatController::class, 'deleteMultiple'])->name('delete-multiple-perawat');
    Route::get('/perawat', [PerawatController::class, 'index'])->name('perawat.index');
    Route::get('/perawat/tambah', [PerawatController::class, 'create'])->name('perawat.create');
    Route::post('/perawat', [PerawatController::class, 'store'])->name('perawat.store');
    Route::get('/perawat/{perawat}/edit', [PerawatController::class, 'edit'])->name('perawat.edit');
    Route::post('/perawat/{perawat}', [PerawatController::class, 'update'])->name('perawat.update');
    Route::post('/perawat/detail/{perawat}', [PerawatController::class, 'detail'])->name('perawat.detail');
    Route::delete('perawat/{perawat}', [PerawatController::class, 'destroy'])->name('perawat.destroy');

    //Pasien
    Route::post('/pasien/delete-multiple-pasien', [PasienController::class, 'deleteMultiple'])->name('delete-multiple-pasien');
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/pasien/tambah', [PasienController::class, 'create'])->name('pasien.create');
    Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/pasien/{pasien}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::post('/pasien/{pasien}', [PasienController::class, 'update'])->name('pasien.update');
    Route::delete('pasien/{pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');

    //Pelayanan
    Route::post('/pelayanan/delete-multiple-pelayanan', [PelayananController::class, 'deleteMultiple'])->name('delete-multiple-pelayanan');
    Route::get('/pelayanan', [PelayananController::class, 'index'])->name('pelayanan.index');
    Route::get('/pelayanan/hitungHarga', [PelayananController::class, 'hitungHarga'])->name('pelayanan.hitung');
    Route::get('/pelayanan/tambah', [PelayananController::class, 'create'])->name('pelayanan.create');
    Route::get('/pelayanan/{pelayanan}', [PelayananController::class, 'show'])->name('pelayanan.show');
    Route::post('/pelayanan', [PelayananController::class, 'store'])->name('pelayanan.store');
    Route::delete('pelayanan/{pelayanan}', [PelayananController::class, 'destroy'])->name('pelayanan.destroy');
    Route::post('/pelayanan/nonaktif/{pelayanan}', [PelayananController::class, 'nonaktif'])->name('pelayanan.nonaktif');
    Route::post('/pelayanan/detail/{pelayanan}', [PelayananController::class, 'detail'])->name('pelayanan.detail');

    //Kota
    Route::post('/kota/delete-multiple-kota', [KotaController::class, 'deleteMultiple'])->name('delete-multiple-kota');
    Route::get('/kota', [KotaController::class, 'index'])->name('kota.index');
    Route::post('/kota', [KotaController::class, 'store'])->name('kota.store');
    Route::get('/kota/{kota}/edit', [KotaController::class, 'edit'])->name('kota.edit');
    Route::delete('kota/{kota}', [KotaController::class, 'destroy'])->name('kota.destroy');

    // Ganti Password
    Route::get('/ganti-password', [GantiPasswordController::class, 'index'])->name('ganti-password.index');
    Route::post('/ganti-password', [GantiPasswordController::class, 'update'])->name('ganti-password.update');

    // User
    Route::post('/pengguna/delete-multiple-user', [UserController::class, 'deleteMultiple'])->name('delete-multiple-user');
    Route::get('/pengguna', [UserController::class, 'index'])->name('user.index');
    Route::get('/pengguna/tambah', [UserController::class, 'create'])->name('user.create');
    Route::post('/pengguna', [UserController::class, 'store'])->name('user.store');
    Route::get('/pengguna/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/pengguna/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('pengguna/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    //Layanan
    Route::post('/layanan/delete-multiple-layanan', [LayananController::class, 'deleteMultiple'])->name('delete-multiple-layanan');
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::delete('layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    //Bayar
    Route::post('/bayar/delete-multiple-bayar', [BayarController::class, 'deleteMultiple'])->name('delete-multiple-bayar');
    Route::get('/bayar', [BayarController::class, 'index'])->name('bayar.index');
    Route::post('/bayar', [BayarController::class, 'store'])->name('bayar.store');
    Route::get('/bayar/{bayar}/edit', [BayarController::class, 'edit'])->name('bayar.edit');
    Route::delete('bayar/{bayar}', [BayarController::class, 'destroy'])->name('bayar.destroy');

    //Kategori
    Route::post('/kategori/delete-multiple-kategori', [KategoriController::class, 'deleteMultiple'])->name('delete-multiple-kategori');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::delete('kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    //Poli
    Route::post('/poli/delete-multiple-poli', [PoliController::class, 'deleteMultiple'])->name('delete-multiple-poli');
    Route::get('/poli', [PoliController::class, 'index'])->name('poli.index');
    Route::post('/poli', [PoliController::class, 'store'])->name('poli.store');
    Route::get('/poli/{poli}/edit', [PoliController::class, 'edit'])->name('poli.edit');
    Route::delete('poli/{poli}', [PoliController::class, 'destroy'])->name('poli.destroy');

    //Poli
    Route::post('/jabatan/delete-multiple-jabatan', [JabatanController::class, 'deleteMultiple'])->name('delete-multiple-jabatan');
    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('/jabatan/{jabatan}/edit', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::delete('jabatan/{jabatan}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
});

/*------------------------------------------
--------------------------------------------
All Perawat Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Perawat'])->group(function () {

    Route::get('/perawat/home', [HomeController::class, 'perawatHome'])->name('perawat.home');
});

/*------------------------------------------
--------------------------------------------
All Dokter Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Dokter'])->group(function () {
});
