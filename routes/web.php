<?php

use App\Http\Controllers\kaspem\AdminController;

use App\Http\Controllers\kaspem\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kaspem\DataCTanahController;
use App\Http\Controllers\kaspem\DataDesacController;
use App\Http\Controllers\kaspem\DataPemilikTanahController;
use App\Http\Controllers\kaspem\DataPermohonanInformasiController;
use App\Http\Controllers\kaspem\DataPersilController;
use App\Http\Controllers\kaspem\DataTanahController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Auth::routes();
// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Route Akun Kaspem
Route::middleware(['auth', 'role:kaspem'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/kaspem', 'index')->name('kaspem');
    });

    Route::controller(DataTanahController::class)->group(function () {
        Route::get('/data-tanah', 'index')->name('data-tanah')->middleware('auth');
        Route::post('/data-tanah/store', 'store')->name('data-tanah/store')->middleware('auth');
        Route::post('/data-tanah/{id}', 'update')->name('data-tanah/update')->middleware('auth');
        Route::delete('/data-tanah/{id}', 'destroy')->name('data-tanah')->middleware('auth');
    });

    Route::controller(DataPersilController::class)->group(function () {
        Route::get('/data-persil', 'index')->name('data-persil')->middleware('auth');
        Route::post('/data-persil/store', 'store')->name('data-persil/store')->middleware('auth');
        Route::post('/data-persil/{id}', 'update')->name('data-persil/update')->middleware('auth');
        Route::delete('/data-persil/{id}', 'destroy')->name('data-persil')->middleware('auth');
    });

    Route::controller(DataCTanahController::class)->group(
        function () {
            Route::get('/data-c-tanah', 'index')->name('data-c-tanah')->middleware('auth');
            Route::get('/data-c-tanah/{id_c_desa}', 'index')->name('data-c-tanah/cari')->middleware('auth');
            Route::post('/data-c-tanah/store', 'store')->name('data-c-tanah/store')->middleware('auth');
            Route::post('/data-c-tanah/{id_c_desa}', 'update')->name('data-c-tanah/update')->middleware('auth');
            Route::delete('/data-c-tanah/{id_c_desa}', 'destroy')->name('data-c-tanah')->middleware('auth');
        }
    );

    Route::controller(DataPemilikTanahController::class)->group(
        function () {
            Route::get('/data-pemilik-tanah', 'index')->name('data-pemilik-tanah')->middleware('auth');
            Route::post('/data-pemilik-tanah/store', 'save')->name('data-pemilik-tanah/store')->middleware('auth');
            Route::post('/data-pemilik-tanah/{id_pemilik}', 'update')->name('data-pemilik-tanah')->middleware('auth');
            Route::delete('/data-pemilik-tanah/{id_pemilik}', 'destroy')->name('data-pemilik-tanah')->middleware('auth');
            Route::get('/data-pemilik-tanah/pdf/{id_pemilik}', 'pdf')->name('data-pemilik-tanah/pdf')->middleware('auth');
            Route::get('/data-pemilik-tanah/pdflurah/{id_pemilik}', 'pdflurah')->name('data-pemilik-tanah/pdflurah')->middleware('auth');
        }
    );

    Route::controller(DataPermohonanInformasiController::class)->group(
        function () {
            Route::get('/permohonan-informasi', 'index')->name('permohonan-informasi')->middleware('auth');
            Route::post('/permohonan-informasi/save', 'store')->name('permohonan-informasi/save')->middleware('auth');
            Route::post('/permohonan-informasi/{nik_mati}', 'update')->name('permohonan-informasi')->middleware('auth');
            Route::delete('/permohonan-informasi/{nik_mati}', 'destroy')->name('permohonan-informasi')->middleware('auth');
            Route::get('/permohonan-informasi/pdf/{nik_mati}', 'pdf')->name('permohonan-informasi/pdf')->middleware('auth');
            Route::get('/permohonan-informasi/pdflurah/{nik_mati}', 'pdflurah')->name('permohonan-informasi/pdflurah')->middleware('auth');
        }
    );
});

// Route Akun Warga/Penduduk
// Route::middleware(['auth', 'role:masyarakat'])->group(function () {
//     Route::controller(WargaController::class)->group(function () {
//         Route::get('/masyarakat', 'index')->name('masyarakat');
//     });

//     // Route::controller(WargaMasyarakatController::class)->group(function () {
//     //     Route::get('/warga/data-penduduk', 'index')->name('warga/data-penduduk');
//     //     Route::post('/warga/data-penduduk/store', 'store')->name('warga/data-penduduk/store');
//     //     Route::post('/warga/data-penduduk/{nik}', 'update')->name('warga/data-penduduk/update');
//     //     Route::delete('/warga/data-penduduk/{nik}', 'destroy')->name('warga/data-penduduk');
//     // });

//     Route::controller(WargaSuratKetKelahiranController::class)->group(
//         function () {
//             Route::get('/warga/surat-keterangan-kelahiran', 'index')->name('warga/surat-keterangan-kelahiran');
//             Route::post('/warga/surat-keterangan-kelahiran/store', 'store')->name('warga/surat-keterangan-kelahiran/store');
//             Route::post('/warga/surat-keterangan-kelahiran/{nik_bayi}', 'update')->name('warga/surat-keterangan-kelahiran');
//             Route::delete('/warga/surat-keterangan-kelahiran/{nik_bayi}', 'destroy')->name('warga/surat-keterangan-kelahiran');
//         }
//     );

//     Route::controller(WargaSuratKetKematianController::class)->group(
//         function () {
//             Route::get('/warga/surat-keterangan-kematian', 'index')->name('warga/surat-keterangan-kematian');
//             Route::post('/warga/surat-keterangan-kematian/store', 'store')->name('warga/surat-keterangan-kematian/store');
//             Route::post('/warga/surat-keterangan-kematian/{nik_bayi}', 'update')->name('warga/surat-keterangan-kematian');
//             Route::delete('/warga/surat-keterangan-kematian/{nik_bayi}', 'destroy')->name('warga/surat-keterangan-kematian');
//         }
//     );

//     Route::controller(WargaMutasiMAsukController::class)->group(
//         function () {
//             Route::get('/warga/data-mutasi-masuk', 'index')->name('warga/data-mutasi-masuk');
//             Route::post('/warga/data-mutasi-masuk/store', 'store')->name('warga/data-mutasi-masuk/store');
//             Route::post('/warga/data-mutasi-masuk/update/{nik_mm}', 'update')->name('warga/data-mutasi-masuk/update');
//             Route::delete('/warga/data-mutasi-masuk/delete/{nik_mm}', 'destroy')->name('warga/data-mutasi-masuk/delete');
//         }
//     );

//     Route::controller(WargaMutasiKeluarController::class)->group(
//         function () {
//             Route::get('/warga/data-mutasi-keluar', 'index')->name('warga/data-mutasi-keluar');
//             Route::post('/warga/data-mutasi-keluar/store', 'store')->name('warga/data-mutasi-keluar/store');
//             Route::post('/warga/data-mutasi-keluar/update/{nik_mk}', 'update')->name('warga/data-mutasi-keluar/update');
//             Route::delete('/warga/data-mutasi-keluar/delete/{nik_mk}', 'destroy')->name('warga/data-mutasi-keluar/delete');
//         }
//     );

//     Route::controller(WargaSuratKetBedaNamaController::class)->group(
//         function () {
//             Route::get('/warga/surat-ket-beda-nama', 'index')->name('warga/surat-ket-beda-nama');
//             Route::post('/warga/surat-ket-beda-nama/store', 'store')->name('warga/surat-ket-beda-nama/store');
//             Route::post('/warga/surat-ket-beda-nama/verif/{nik}', 'update')->name('warga/surat-ket-beda-nama/verif');
//             Route::delete('/warga/surat-ket-beda-nama/delete/{nik}', 'destroy')->name('warga/surat-ket-beda-nama/delete');
//             Route::get('/warga/surat-keterangan-beda-nama/pdf/{nik}', 'pdf')->name('warga/surat-keterangan-beda-nama/pdf');
//             Route::get('/warga/surat-keterangan-beda-nama/pdf/lurah/{nik}', 'pdflurah')->name('warga/surat-keterangan-beda-nama/pdflurah');
//         }
//     );

//     Route::controller(WargaSuratKetStatusController::class)->group(
//         function () {
//             Route::get('/warga/surat-keterangan-status', 'index')->name('warga/surat-keterangan-status');
//             Route::post('/warga/surat-keterangan-status/store', 'store')->name('warga/surat-keterangan-status/store');
//             Route::post('/warga/surat-keterangan-status/{nik}', 'update')->name('warga/surat-keterangan-status/verif');
//             Route::delete('/warga/surat-keterangan-status/delete/{nik}', 'destroy')->name('warga/surat-keterangan-status/delete');
//             Route::get('/warga/surat-keterangan-status/pdf/{nik}', 'pdf')->name('warga/surat-keterangan-status/pdf');
//             Route::get('/warga/surat-keterangan-status/pdf/lurah/{nik}', 'pdflurah')->name('warga/surat-keterangan-status/pdflurah');
//         }
//     );

//     Route::controller(WargaSuratKetBiasaController::class)->group(
//         function () {
//             Route::get('/warga/surat-keterangan-biasa', 'index')->name('warga/surat-keterangan-biasa');
//             Route::post('/warga/surat-keterangan-biasa/store', 'store')->name('warga/surat-keterangan-biasa/store');
//             Route::post('/warga/surat-keterangan-biasa/{nik}', 'update')->name('warga/surat-keterangan-biasa/verif');
//             Route::delete('/warga/surat-keterangan-biasa/delete/{nik}', 'destroy')->name('warga/surat-keterangan-status/delete');
//             Route::get('/warga/surat-keterangan-biasa/pdf/{nik}', 'pdf')->name('warga/surat-keterangan-biasa/pdf');
//             Route::get('/warga/surat-keterangan-biasa/pdf/lurah/{nik}', 'pdflurah')->name('warga/surat-keterangan-biasa/pdflurah');
//         }
//     );
// });
