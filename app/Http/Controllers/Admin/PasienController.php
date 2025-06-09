<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Pesanan;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('pesanan')->get();
        return view('admin.pasien.index', compact('pasiens'));
    }



    public function edit(Pasien $pasien)
    {
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
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
            'jadwal_pemesanan' => 'required|date',
            'jenis_layanan' => 'required',
            'persetujuan' => 'accepted',
        ]);

        // Update data pasien
        $pasien->update([
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Update pesanan terakhir
        $pesanan = $pasien->pesanan()->latest()->first();
        if ($pesanan) {
            $pesanan->update([
                'gejala' => $request->gejala,
                'riwayat_penyakit' => $request->riwayat_penyakit,
                'keluhan' => $request->keluhan,
                'jadwal_pemesanan' => $request->jadwal_pemesanan,
                'jenis_layanan' => $request->jenis_layanan,
            ]);
        }

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }

    public function show(Pasien $pasien)
    {
        return view('admin.pasien.detail', compact('pasien'));
    }
}
