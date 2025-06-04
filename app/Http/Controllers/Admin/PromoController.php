<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index() {
        $promos = Promo::all();
        return view('admin.promo.index', compact('promos'));
    }

    public function create() {
        return view('admin.promo.create');
    }

    public function store(Request $request) {
        Promo::create($request->only('judul', 'diskon'));
        return redirect()->route('promo.index');
    }

    public function edit(Promo $promo) {
        return view('admin.promo.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo) {
        $promo->update($request->only('judul', 'diskon'));
        return redirect()->route('promo.index');
    }
}
