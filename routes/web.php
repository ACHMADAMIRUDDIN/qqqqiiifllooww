<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pasien\MendaftarController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\PemesananController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PromoController;
use Illuminate\Support\Facades\Log;


Route::get('/', fn () => view('layouts.beranda'))->name('beranda');
Route::get('/beranda', fn () => view('layouts.beranda'))->name('beranda');
Route::get('/tentangkami', fn () => view('layouts.tentangkami'))->name('tentangkami');
Route::get('/pengaduan', fn () => view('layouts.pengaduan'))->name('pengaduan');
Route::get('/iki', fn () => view('layouts.iki'))->name('iki');
Route::get('/akupresure', fn () => view('layouts.akupresure'))->name('akupresure');
Route::get('/apalah', fn () => view('layouts.apalah'))->name('apalah');
Route::get('/bekam', fn () => view('layouts.bekam'))->name('bekam');
Route::get('/pijatt', fn () => view('layouts.pijatt'))->name('pijatt');
Route::get('/artikel', fn () => view('layouts.artikel'))->name('artikel');
Route::get('/beritaa', fn () => view('layouts.beritaa'))->name('beritaa');
Route::get('/indexx', fn () => view('layouts.indexx'))->name('indexx');
Route::get('/profildokter', fn () => view('layouts.profildokter'))->name('profildokter');
Route::get('/jadwaldokter1', fn () => view('layouts.jadwaldokter1'))->name('jadwaldokter1');

Route::get('/detailartikel', fn () => view('layouts.detailartikel'))->name('detailartikel');
Route::get('/detailartikel1', fn () => view('layouts.detailartikel1'))->name('detailartikel1');
Route::get('/detailartikel2', fn () => view('layouts.detailartikel2'))->name('detailartikel2');
Route::get('/detailartikel3', fn () => view('layouts.detailartikel3'))->name('detailartikel3');

Route::get('/detailberita1', fn () => view('layouts.detailberita1'))->name('detailberita1');
Route::get('/detailberita2', fn () => view('layouts.detailberita2'))->name('detailberita2');
Route::get('/detailberita3', fn () => view('layouts.detailberita3'))->name('detailberita3');

Route::get('/detailprofil1', fn () => view('layouts.detailprofil1'))->name('detailprofil1');
Route::get('/detailprofil2', fn () => view('layouts.detailprofil2'))->name('detailprofil2');
Route::get('/detailprofil3', fn () => view('layouts.detailprofil3'))->name('detailprofil3');

Route::post('/form', [MendaftarController::class, 'store'])->name('form.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pesanlayanan', fn () => view('layouts.pesanlayanan'))->name('pesanlayanan');
    Route::get('/pesan-fisioterapi', fn () => view('layouts.pesanlayanan'))->name('pesan.fisioterapi');
});


   Route::get('/dashboard', function () {
       $user = Auth::user();
       Log::info('UserRole: ' . implode(', ', $user->getRoleNames()->toArray()));

       if ($user->hasRole('admin')) {
           return redirect()->route('admin.dashboard');
       } elseif ($user->HasRole('user')) {
           return redirect()->route('beranda');
       }

       return abort(403);
   })->middleware('auth');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    Route::resource('pasien', PasienController::class);
    Route::resource('pesan', PesanController::class);
    Route::resource('profil', ProfilController::class)->only(['index', 'update']);
    Route::resource('promo', PromoController::class);
    Route::resource('pemesanan', PemesananController::class)->only(['index', 'update']);
});

require __DIR__.'/auth.php';
