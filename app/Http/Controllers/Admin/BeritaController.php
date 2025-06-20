<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pdf' => 'required|file|mimes:pdf|max:102400', // 100MB
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan PDF
        $pdfPath = $request->file('pdf')->store('berita/pdf', 'public');

        // Simpan thumbnail jika ada
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('berita/thumbnails', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'pdf_path' => $pdfPath,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupload.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file PDF
        if ($berita->pdf_path && Storage::disk('public')->exists($berita->pdf_path)) {
            Storage::disk('public')->delete($berita->pdf_path);
        }
        // Hapus thumbnail jika ada
        if ($berita->thumbnail && Storage::disk('public')->exists($berita->thumbnail)) {
            Storage::disk('public')->delete($berita->thumbnail);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
