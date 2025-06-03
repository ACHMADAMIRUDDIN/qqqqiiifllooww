<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PesanControllers;
use App\Http\Controllers\Admin\PemesananControllers;
use App\Http\Controllers\Admin\ProfilControllers;
use App\Http\Controllers\Admin\PromoControllers;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('layouts.beranda');
})->name('beranda');

Route::get('/pesanlayanan', function () {
    return view('layouts.pesanlayanan');
})->middleware(['auth', 'verified'])->name('pesanlayanan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contoh: route untuk pemesanan layanan yang butuh login
    Route::get('/pesan-fisioterapi', function () {
        // return view('pesan-fisioterapi'); // Buat view ini sesuai kebutuhan
    })->name('pesan.fisioterapi');

});

Route::middleware(['auth', 'atmin'])->prefix('admin')->name('admin.')->group(function () {
    // URL: /admin/dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Pastikan file ini ada: resources/views/admin/dashboard.blade.php
    });

    Route::resource('pasien', PasienController::class);
    Route::resource('pesan', PesanControllers::class)->only(['index', 'update']);
    Route::resource('profil', ProfilControllers::class)->only(['index', 'update']);
    Route::resource('promo', PromoControllers::class);
    Route::resource('pemesanan', PemesananControllers::class)->only(['index', 'update']);
});

Route::get('/redirect-dashboard', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
    }

    return redirect('/beranda'); // ini route default untuk non-admin
});

Route::get('/tentangkami', function () {
    return view('layouts.tentangkami');
})->name('tentangkami');


Route::get('/pengaduan', function () {
    return view('layouts.pengaduan');
})->name('pengaduan');
Route::get('/iki', function () {
    return view('layouts.iki');
})->name('iki');
// Route for the 'iki' view
Route::get('/akupresure', function () {
    return view('layouts.akupresure');
})->name('akupresure');
// Route for the 'iki' view
Route::get('/apalah', function () {
    return view('layouts.apalah');
})->name('apalah');
// Route for the 'iki' view
Route::get('/bekam', function () {
    return view('layouts.bekam');
})->name('bekam');
Route::get('/pesanlayanan', function () {
    return view('layouts.pesanlayanan');
})->name('pesanlayanan');
Route::get('/pijatt', function () {
    return view('layouts.pijatt');
})->name('pijatt');
Route::get('/beranda', function () {
    return view('layouts.beranda');
})->name('beranda');
Route::get('/detailartikel', function () {
    return view('layouts.detailartikel');
})->name('detailartikel');
Route::get('/detailartikel1', function () {
    return view('layouts.detailartikel1');
})->name('detailartikel1');
Route::get('/detailartikel2', function () {
    return view('layouts.detailartikel2');
})->name('detailartikel2');
Route::get('/detailartikel3', function () {
    return view('layouts.detailartikel3');
})->name('detailartikel3');
Route::get('/inilagi', function () {
    return view('layouts.inilagi');
})->name('inilagi');
Route::get('/detailberita1', function () {
    return view('layouts.detailberita1');
})->name('detailberita1');

Route::get('/detailberita2', function () {
    return view('layouts.detailberita2');
})->name('detailberita2');
Route::get('/detailberita3', function () {
    return view('layouts.detailberita3');
})->name('detailberita3');
Route::get('/detailprofil1', function () {
    return view('layouts.detailprofil1');
})->name('detailprofil1');
Route::get('/detailprofil2', function () {
    return view('layouts.detailprofil2');
})->name('detailprofil2');
Route::get('/detailprofil3', function () {
    return view('layouts.detailprofil3');
})->name('detailprofil3');
Route::get('/artikel', function () {
    return view('layouts.artikel');
})->name('artikel');
Route::get('/beritaa', function () {
    return view('layouts.beritaa');
})->name('beritaa');
Route::get('/indexx', function () {
    return view('layouts.indexx');
})->name('indexx');
Route::get('/profildokter', function () {
    return view('layouts.profildokter');
})->name('profildokter');
Route::get('/jadwaldokter1', function () {
    return view('layouts.jadwaldokter1');
})->name('jadwaldokter1');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
