@extends('admin.dashboard')

{{-- Fonts & Icons --}}
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />

{{-- Tailwind CDN (Jika belum ada di layout) --}}
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@fortawesome/fontawesome-free/js/all.js"></script>

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Detail Data Pasien</h2>

    @php
        $latestPesanan = $pasien->pesanan->last();
    @endphp

    <div class="bg-white p-6 shadow-xl rounded-xl space-y-6 border border-gray-200">

        {{-- Data Pasien --}}
        <div>
            <h3 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">🧍‍♂️ Informasi Pasien</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $pasien->nama_lengkap }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Tanggal Lahir</p>
                    <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">No. HP</p>
                    <p class="text-lg text-gray-900">{{ $pasien->no_hp }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Email</p>
                    <p class="text-lg text-gray-900">{{ $pasien->email }}</p>
                </div>
                <div class="col-span-1 sm:col-span-2">
                    <p class="text-sm font-medium text-gray-500">Alamat</p>
                    <p class="text-lg text-gray-900">{{ $pasien->alamat }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Jenis Kelamin</p>
                    <p class="text-lg text-gray-900">{{ $pasien->jenis_kelamin }}</p>
                </div>
            </div>
        </div>

        {{-- Data Pesanan --}}
        <div x-data="{ open: true }" class="transition-all duration-300">
            <button onclick="toggleSection()" class="flex items-center justify-between w-full px-4 py-2 bg-blue-100 rounded hover:bg-blue-200 transition mb-2">
                <span class="text-blue-800 font-semibold">📋 Detail Pemesanan</span>
                <i id="toggleIcon" class="fas fa-chevron-down text-blue-800"></i>
            </button>

            <div id="pesananSection" class="space-y-4">
                @if ($latestPesanan)
                    <div>
                        <p class="text-sm font-medium text-gray-500">Gejala</p>
                        <p class="text-lg text-gray-900">{{ $latestPesanan->gejala }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Riwayat Penyakit</p>
                        <p class="text-lg text-gray-900">{{ $latestPesanan->riwayat_penyakit }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Keluhan</p>
                        <p class="text-lg text-gray-900">{{ $latestPesanan->keluhan }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Jadwal Pemesanan</p>
                        <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($latestPesanan->jadwal_pemesanan)->translatedFormat('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Jenis Layanan</p>
                        <p class="text-lg text-gray-900">{{ $latestPesanan->jenis_layanan }}</p>
                    </div>
                @else
                    <div class="text-red-600 font-semibold">Pasien ini belum memiliki data pemesanan.</div>
                @endif
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-between items-center pt-4">
            {{-- Kembali --}}
            <button onclick="window.history.back()"
                class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 transition">
                ← Kembali
            </button>

            {{-- Kirim WA --}}
            @if ($latestPesanan)
                @php
                    $pesan = "Permisi Bapak, Anda Memiliki pasien dengan informasi berikut:\n" .
                        "Nama : {$pasien->nama_lengkap}\n" .
                        "Jenis Kelamin : {$pasien->jenis_kelamin}\n" .
                        "Gejala : {$latestPesanan->gejala}\n" .
                        "Riwayat Penyakit : {$latestPesanan->riwayat_penyakit}\n" .
                        "Keluhan : {$latestPesanan->keluhan}\n" .
                        "Jadwal Pemesanan : " . \Carbon\Carbon::parse($latestPesanan->jadwal_pemesanan)->translatedFormat('d F Y') . "\n" .
                        "Jenis Layanan : {$latestPesanan->jenis_layanan}\n" .
                        "Terimakasih";
                @endphp
                <a href="https://wa.me/6281278084390?text={{ urlencode($pesan) }}"
                   class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
                   target="_blank">
                    📤 Kirim via WhatsApp
                </a>
            @endif
        </div>
    </div>
</div>

{{-- JS for toggle section --}}
<script>
    function toggleSection() {
        const section = document.getElementById('pesananSection');
        const icon = document.getElementById('toggleIcon');
        if (section.style.display === 'none') {
            section.style.display = 'block';
            icon.classList.replace('fa-chevron-right', 'fa-chevron-down');
        } else {
            section.style.display = 'none';
            icon.classList.replace('fa-chevron-down', 'fa-chevron-right');
        }
    }

    // Initialize hidden if needed
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('pesananSection').style.display = 'block';
    });
</script>
@endsection
