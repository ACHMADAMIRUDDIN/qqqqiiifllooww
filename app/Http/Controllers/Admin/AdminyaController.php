<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Pesanan;

class AdminyaController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalPasiens = Pasien::count();
        $totalPemesanan = Pesanan::count();

        return view('admin.adminya.index', compact(
            'totalUsers',
            'totalPasiens',
            'totalPemesanan'
        ));
    }
}
