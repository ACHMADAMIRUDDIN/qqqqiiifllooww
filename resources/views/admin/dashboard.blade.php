@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="{{ route('admin.pasien.index') }}"
           class="block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-lg transition border border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Kelola Pasien</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-2">Lihat dan atur data pasien.</p>
        </a>

        <a href="{{ route('admin.pesan.index') }}"
           class="block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-lg transition border border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Pesan Pasien</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-2">Kelola pesanan masuk dari pasien.</p>
        </a>

        {{-- <a href="{{ route('admin.profil.index') }}"
           class="block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-lg transition border border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Profil Klinik</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-2">Edit informasi profil klinik.</p>
        </a>

        <a href="{{ route('admin.promo.index') }}"
           class="block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-lg transition border border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Promo Layanan</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-2">Kelola promo dan diskon layanan.</p>
        </a>

        <a href="{{ route('admin.pemesanan.index') }}"
           class="block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-lg transition border border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Konfirmasi Pemesanan</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-2">Lihat dan konfirmasi pemesanan layanan.</p>
        </a> --}}
    </div>
</div>
@endsection
