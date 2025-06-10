<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Pesanan;

class MendaftarController extends Controller
{
    public function store(Request $request)
    {
    $request->validate([
        'nama_lengkap' => 'required',
        'tanggal_lahir' => 'required|date',
        'no_hp' => 'required',
        'email' => 'required|email',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
        'gejala' => 'required',
        'riwayat_penyakit' => 'required',
        'keluhan' => 'required',
        'keluhan_utama' => 'required',
        'jadwal_pemesanan' => 'required|date',
        'jenis_layanan' => 'required',
        'persetujuan' => 'accepted',
    ]);

    // Cek apakah pasien sudah ada berdasarkan email
    $pasien = Pasien::where('email', $request->email)->first();

    if (!$pasien) {
        // Jika belum ada, buat pasien baru
        $pasien = Pasien::create([
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
    }

    // Simpan pesanan baru untuk pasien ini
    Pesanan::create([
        'id_pasien' => $pasien->id_pasien, // pastikan kolom ini sesuai nama field foreign key-nya
        'gejala' => $request->gejala,
        'riwayat_penyakit' => $request->riwayat_penyakit,
        'keluhan' => $request->keluhan,
        'keluhan_utama' => $request->keluhan_utama,
        'jadwal_pemesanan' => $request->jadwal_pemesanan,
        'jenis_layanan' => $request->jenis_layanan,
    ]);

       return redirect()->back()
    ->with('status', 'Terima Kasih, Pesanan Anda Berhasil Dikirim')
    ->with('info', 'Mohon Tunggu Konfirmasi Dari Admin');
    }
}


