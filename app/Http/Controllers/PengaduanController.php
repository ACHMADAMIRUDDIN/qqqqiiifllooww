<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'no_handphone' => 'required|string|max:20',
            'alamat_email' => 'required|email',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'usia' => 'nullable|string|max:10',
            'pekerjaan' => 'nullable|string|max:100',
            'jenis_layanan' => 'nullable|string|max:100',
            'tanggal_layanan' => 'nullable|date',
            'kritik_saran' => 'required|string',
        ]);

        \App\Models\Pengaduan::create($request->all());

        return back()->with('success', 'Pengaduan berhasil dikirim.');
    }
}
