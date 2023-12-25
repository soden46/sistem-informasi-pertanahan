<?php

use App\Http\Controllers\kaspem\AdminController;

use App\Http\Controllers\kaspem\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kades\KadesController;
use App\Http\Controllers\kades\KadesDataCTanahController;
use App\Http\Controllers\kades\KadesDataPemilikTanahController;
use App\Http\Controllers\kades\KadesDataPermohonanInformasiController;
use App\Http\Controllers\kades\KadesDataPersilController;
use App\Http\Controllers\kades\KadesDataTanahController;
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

    Route::controller(DataPersilController::class)->group(function () {
        Route::get('/data-persil', 'index')->name('data-persil')->middleware('auth');
        Route::post('/data-persil/store', 'store')->name('data-persil/store')->middleware('auth');
        Route::post('/data-persil/{no_kk}', 'update')->name('data-persil/update')->middleware('auth');
        Route::delete('/data-persil/{no_kk}', 'destroy')->name('data-persil')->middleware('auth');
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
            Route::post('/permohonan-informasi/save', 'save')->name('permohonan-informasi/save')->middleware('auth');
            Route::post('/permohonan-informasi/{id_pemohon}', 'update')->name('permohonan-informasi')->middleware('auth');
            Route::delete('/permohonan-informasi/{id_pemohon}', 'destroy')->name('permohonan-informasi')->middleware('auth');
            Route::post('/permohonan-informasi/verif/{id_pemohon}', 'update')->name('permohonan-informasi/verif');
            Route::get('/permohonan-informasi/pdf/{id_pemohon}', 'pdf')->name('permohonan-informasi/pdf')->middleware('auth');
            Route::get('/permohonan-informasi/pdflurah/{id_pemohon}', 'pdflurah')->name('permohonan-informasi/pdflurah')->middleware('auth');
        }
    );

    Route::controller(UserController::class)->group(function () {
        Route::get('/other-account', 'index')->name('other-account')->middleware('auth');
        Route::post('/other-account/store', 'store')->name('other-account/store')->middleware('auth');
        Route::post('other-account/update/{id}', 'update')->name('other-account/update')->middleware('auth');
    });
});



//Route Akun Kades
Route::middleware(['auth', 'role:kades'])->group(function () {
    Route::controller(KadesController::class)->group(function () {
        Route::get('/kades', 'index')->name('kades');
    });

    Route::controller(KadesDataPersilController::class)->group(function () {
        Route::get('/kades/data-persil', 'index')->name('kades/data-persil')->middleware('auth');
        Route::post('/kades/data-persil/store', 'store')->name('kades/data-persil/store')->middleware('auth');
        Route::post('/kades/data-persil/{no_kk}', 'update')->name('kades/data-persil/update')->middleware('auth');
        Route::delete('/kades/data-persil/{no_kk}', 'destroy')->name('kades/data-persil')->middleware('auth');
    });

    Route::controller(KadesDataCTanahController::class)->group(
        function () {
            Route::get('/kades/data-c-tanah', 'index')->name('kades/data-c-tanah')->middleware('auth');
            Route::get('/kades/data-c-tanah/{id_c_desa}', 'index')->name('kades/data-c-tanah/cari')->middleware('auth');
            Route::post('/kades/data-c-tanah/store', 'store')->name('kades/data-c-tanah/store')->middleware('auth');
            Route::post('/kades/data-c-tanah/{id_c_desa}', 'update')->name('kades/data-c-tanah/update')->middleware('auth');
            Route::delete('/kades/data-c-tanah/{id_c_desa}', 'destroy')->name('kades/data-c-tanah')->middleware('auth');
        }
    );

    Route::controller(KadesDataPemilikTanahController::class)->group(
        function () {
            Route::get('/kades/data-pemilik-tanah', 'index')->name('kades/data-pemilik-tanah')->middleware('auth');
            Route::post('/kades/data-pemilik-tanah/store', 'save')->name('kades/data-pemilik-tanah/store')->middleware('auth');
            Route::post('/kades/data-pemilik-tanah/{id_pemilik}', 'update')->name('kades/data-pemilik-tanah')->middleware('auth');
            Route::delete('/kades/data-pemilik-tanah/{id_pemilik}', 'destroy')->name('kades/data-pemilik-tanah')->middleware('auth');
            Route::get('/kades/data-pemilik-tanah/pdf/{id_pemilik}', 'pdf')->name('kades/data-pemilik-tanah/pdf')->middleware('auth');
            Route::get('/kades/data-pemilik-tanah/pdflurah/{id_pemilik}', 'pdflurah')->name('kades/data-pemilik-tanah/pdflurah')->middleware('auth');
        }
    );

    Route::controller(KadesDataPermohonanInformasiController::class)->group(
        function () {
            Route::get('/kades/permohonan-informasi', 'index')->name('kades/permohonan-informasi')->middleware('auth');
            Route::post('/kades/permohonan-informasi/save', 'save')->name('kades/permohonan-informasi/save')->middleware('auth');
            Route::post('/kades/permohonan-informasi/{id_pemohon}', 'update')->name('kades/permohonan-informasi')->middleware('auth');
            Route::delete('/kades/permohonan-informasi/{id_pemohon}', 'destroy')->name('kades/permohonan-informasi')->middleware('auth');
            Route::post('/kades/permohonan-informasi/verif/{id_pemohon}', 'update')->name('kades/permohonan-informasi/verif');
            Route::get('/kades/permohonan-informasi/pdf/{id_pemohon}', 'pdf')->name('kades/permohonan-informasi/pdf')->middleware('auth');
            Route::get('/kades/permohonan-informasi/pdflurah/{id_pemohon}', 'pdflurah')->name('kades/permohonan-informasi/pdflurah')->middleware('auth');
        }
    );
});
