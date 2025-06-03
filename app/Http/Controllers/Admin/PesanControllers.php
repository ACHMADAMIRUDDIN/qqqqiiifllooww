<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesanControllers extends Controller
{
    public function index() {
        $pesans = Pesanan::all();
        return view('admin.pesan.index', compact('pesans'));
    }

    public function reply(Request $request, $id) {
        $pesan = Pesanan::findOrFail($id);
        $pesan->balasan = $request->balasan;
        $pesan->save();
        return back();
    }
}
