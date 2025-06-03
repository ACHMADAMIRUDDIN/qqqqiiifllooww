<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilControllers extends Controller
{
    public function index() {
        $profil = Profil::first();
        return view('admin.profil.index', compact('profil'));
    }

    public function update(Request $request) {
        $profil = Profil::first();
        $profil->update($request->only('nama_klinik', 'deskripsi'));
        return back();
    }
}
