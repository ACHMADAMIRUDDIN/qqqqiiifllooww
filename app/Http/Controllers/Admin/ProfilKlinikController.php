<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil_klinik;
use App\Models\GambarKlinik;
use Illuminate\Support\Facades\Storage;

class ProfilKlinikController extends Controller
{
    public function index()
    {
        $profil_klinik = Profil_klinik::with('gambarKlinik')->first();
    return view('admin.profil_klinik.index', compact('profil_klinik'));
    }

public function create()
{
    // Cegah tambah jika sudah ada
    if (Profil_klinik::count() >= 1) {
        return redirect()->route('admin.profil_klinik.index')
            ->with('error', 'Hanya satu deskripsi profil yang diizinkan.');
    }

    return view('admin.profil_klinik.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'deskripsi' => 'required|string|max:1000',
        'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $profil = Profil_klinik::create([
        'deskripsi' => $request->deskripsi
    ]);

    if ($request->hasFile('gambar')) {
        foreach ($request->file('gambar') as $img) {
            $path = $img->store('gambar_klinik', 'public');
            GambarKlinik::create([
                'profil_klinik_id' => $profil->id,
                'gambar' => $path
            ]);
        }
    }

    return redirect()->route('admin.profil_klinik.index')
        ->with('success', 'Profil berhasil disimpan.');
}

public function edit(Profil_klinik $profil_klinik)
{
    return view('admin.profil_klinik.edit', compact('profil_klinik'));
}

public function update(Request $request, Profil_klinik $profil_klinik)
{
    $request->validate([
        'deskripsi' => 'required|string|max:1000',
        'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $profil_klinik->update(['deskripsi' => $request->deskripsi]);

    if ($request->hasFile('gambar')) {
        foreach ($request->file('gambar') as $img) {
            $path = $img->store('gambar_klinik', 'public');
            GambarKlinik::create([
                'profil_klinik_id' => $profil_klinik->id,
                'gambar' => $path
            ]);
        }
    }

    return redirect()->route('admin.profil_klinik.index')
        ->with('success', 'Profil berhasil diperbarui.');
}

public function destroyGambar($id)
{
    $gambar = GambarKlinik::findOrFail($id);
    Storage::disk('public')->delete($gambar->gambar);
    $gambar->delete();

    return back()->with('success', 'Gambar berhasil dihapus.');
}

public function createGambar(Profil_klinik $profil_klinik)
{
    return view('admin.profil_klinik.gambar.create', compact('profil_klinik'));
}

// Proses simpan gambar
public function storeGambar(Request $request, Profil_klinik $profil_klinik)
{
    $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = $request->file('gambar')->store('gambar_klinik', 'public');

    $profil_klinik->gambarKlinik()->create([
        'gambar' => $path,
    ]);

    return redirect()->route('admin.profil_klinik.index')->with('success', 'Gambar berhasil ditambahkan');
}

public function editGambar($id)
{
    $gambar = GambarKlinik::findOrFail($id);
    return view('admin.profil_klinik.gambar.edit', compact('gambar'));
}

public function updateGambar(Request $request, $id)
{
    $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    $gambar = GambarKlinik::findOrFail($id);

    // Hapus gambar lama
    if (Storage::disk('public')->exists($gambar->gambar)) {
        Storage::disk('public')->delete($gambar->gambar);
    }

    // Simpan gambar baru
    $path = $request->file('gambar')->store('gambar_klinik', 'public');
    $gambar->update(['gambar' => $path]);

    return redirect()->route('admin.profil_klinik.index')->with('success', 'Gambar berhasil diperbarui.');
}

}
