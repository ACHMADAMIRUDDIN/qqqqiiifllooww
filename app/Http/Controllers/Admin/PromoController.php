<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class PromoController extends Controller
{
    public function index()
    {
        $promoImages = Promo::all();
        return view('admin.promo.index', compact('promoImages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,webp,jpg|max:2048',
        ]);

        $path = $request->file('image')->store('promos', 'public');
        Promo::create([
            'judul' => $request->judul,
            'image_path' => $path,
        ]);

        return back()->with('success', 'Promo berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        Storage::disk('public')->delete($promo->image_path); // Hilangkan backslash di depan Storage
        $promo->delete();

        return back()->with('success', 'Promo berhasil dihapus.');
    }
}
