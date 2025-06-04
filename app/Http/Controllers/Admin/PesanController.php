<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;

class PesanController extends Controller
{
    public function index() {
          $pasiens = Pasien::with('pesanan')->get();

        return view('admin.pesan.index', compact('pasiens'));
    }
}
