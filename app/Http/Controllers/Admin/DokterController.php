<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|image',
            'foto_detail' => 'required|image',
            'keterangan' => 'nullable|string',
            'keterangan_detail' => 'nullable|string',
        ]);
        $foto = $request->file('foto')->store('dokter', 'public');
        $foto_detail = $request->file('foto_detail')->store('dokter', 'public');
        Dokter::create([
            'nama' => $request->nama,
            'foto' => $foto,
            'foto_detail' => $foto_detail,
            'keterangan' => $request->keterangan,
            'keterangan_detail' => $request->keterangan_detail,
        ]);
        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil ditambahkan');
    }

    public function edit(Dokter $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image',
            'foto_detail' => 'nullable|image',
            'keterangan' => 'nullable|string',
            'keterangan_detail' => 'nullable|string',
        ]);
        $data = $request->only(['nama', 'keterangan', 'keterangan_detail']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('dokter', 'public');
        }
        if ($request->hasFile('foto_detail')) {
            $data['foto_detail'] = $request->file('foto_detail')->store('dokter', 'public');
        }
        $dokter->update($data);
        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil diupdate');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil dihapus');
    }
}
