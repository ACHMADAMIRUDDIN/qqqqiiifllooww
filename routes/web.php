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
use App\Models\Pengaduan;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\JadwalDokterController;
use App\Models\JadwalDokter;
use App\Http\Controllers\Admin\DokterController;
use App\Models\Dokter;


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
Route::get('/jadwaldokter1', function () {
    $jadwals = JadwalDokter::all();
    return view('layouts.jadwaldokter1', compact('jadwals'));
})->name('jadwaldokter1');

Route::get('/detailartikel', fn () => view('layouts.detailartikel'))->name('detailartikel');
Route::get('/detailartikel1', fn () => view('layouts.detailartikel1'))->name('detailartikel1');
Route::get('/detailartikel2', fn () => view('layouts.detailartikel2'))->name('detailartikel2');
Route::get('/detailartikel3', fn () => view('layouts.detailartikel3'))->name('detailartikel3');

Route::get('/detailberita1', fn () => view('layouts.detailberita1'))->name('detailberita1');
Route::get('/detailberita2', fn () => view('layouts.detailberita2'))->name('detailberita2');
Route::get('/detailberita3', fn () => view('layouts.detailberita3'))->name('detailberita3');

// Untuk user melihat daftar dokter
Route::get('/profildokter', function () {
    $dokters = Dokter::all();
    return view('layouts.profildokter', compact('dokters'));
})->name('profildokter');

// Untuk user melihat detail dokter (route detailprofil1, detailprofil2, detailprofil3)
Route::get('/detailprofil1', function () {
    // Ambil dokter pertama (atau sesuaikan logika dengan kebutuhan Anda)
    $dokter = Dokter::first();
    return view('layouts.detailprofil1', compact('dokter'));
})->name('detailprofil1');

Route::get('/detailprofil2', function () {
    $dokter = Dokter::skip(1)->first();
    return view('layouts.detailprofil1', compact('dokter'));
})->name('detailprofil2');

Route::get('/detailprofil3', function () {
    $dokter = Dokter::skip(2)->first();
    return view('layouts.detailprofil1', compact('dokter'));
})->name('detailprofil3');

// Route detailprofil dinamis (rekomendasi utama)
Route::get('/detailprofil/{id}', function ($id) {
    $dokter = Dokter::findOrFail($id);
    return view('layouts.detailprofil1', compact('dokter'));
})->name('detailprofil');

Route::post('/form', [MendaftarController::class, 'store'])->name('form.store');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pesanlayanan', fn () => view('layouts.pesanlayanan'))->name('pesanlayanan');
    Route::get('/pesan-fisioterapi', fn () => view('layouts.pesanlayanan'))->name('pesan.fisioterapi');
});


   Route::get('/dashboard', function () {
       $user = Auth::user();
       Log::info('User  Role: ' . implode(', ', $user->getRoleNames()->toArray()));

       if ($user->hasRole('admin')) {
           return redirect()->route('admin.dashboard');
       } elseif ($user->hasRole('user')) {
           return redirect()->route('beranda');
       }

       return abort(403);
   })->middleware('auth')->name('dashboard');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    Route::resource('pasien', PasienController::class);
    Route::resource('pesan', PesanController::class);
    Route::resource('profil', ProfilController::class)->only(['index', 'update']);
    Route::resource('promo', PromoController::class);
    Route::resource('pemesanan', PemesananController::class)->only(['index', 'update']);
    Route::resource('jadwal', JadwalDokterController::class);
    Route::resource('dokter', DokterController::class); // Tambahkan baris ini

    // Tambahkan route pengaduan admin
    Route::get('/pengaduan', function () {
        $pengaduans = \App\Models\Pengaduan::latest()->get();
        return view('admin.pengaduan.tampilan', compact('pengaduans'));
    })->name('pengaduan.tampilan');
});

// Route untuk pasien melihat jadwal dokter
Route::get('/jadwal-dokter', function () {
    $jadwals = JadwalDokter::all();
    return view('layouts.jadwaldokter1', compact('jadwals'));
})->name('jadwaldokter.pasien');

require __DIR__.'/auth.php';
