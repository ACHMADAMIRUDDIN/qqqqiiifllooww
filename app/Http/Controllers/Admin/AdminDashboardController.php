<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Pesanan;

class AdminDashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalUsersLoggedIn = User::whereNotNull('last_login_at')->count();
        $totalPasiens = class_exists(\App\Models\Pasien::class) ? \App\Models\Pasien::count() : 0;
        $totalPemesanan = class_exists(\App\Models\Pesanan::class) ? \App\Models\Pesanan::count() : 0;

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalUsersLoggedIn',
            'totalPasiens',
            'totalPemesanan'
        ));
    }
}
