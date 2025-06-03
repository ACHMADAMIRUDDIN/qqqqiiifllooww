<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananControllers extends Controller
{
    public function index() {
        $pemesanan = Pemesanan::with('pasien')->get();
        return view('admin.pemesanan.index', compact('pemesanan'));
    }

    public function konfirmasi($id) {
        $pesanan = Pemesanan::findOrFail($id);
        $pesanan->status = 'terkonfirmasi';
        $pesanan->save();
        return back();
    }
}
