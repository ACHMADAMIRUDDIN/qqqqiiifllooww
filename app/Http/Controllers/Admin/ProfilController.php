<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function index() {
        $profils = Profil::first();
        return view('admin.profil.index', compact('profil'));
    }

    public function update(Request $request) {
        $profils = Profil::first();
        $profils->update($request->only('nama_klinik', 'deskripsi'));
        return back();
    }
}
