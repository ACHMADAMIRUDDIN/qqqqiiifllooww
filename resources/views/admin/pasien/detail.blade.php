@extends('admin.dashboard')

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Data Pasien</h2>

        @php
            $latestPesanan = $pasien->pesanan->last();
        @endphp

        <div class="bg-white p-6 shadow-md rounded-md space-y-4">

            {{-- Data Pasien --}}
            <div>
                <p class="text-sm font-medium text-gray-700">Nama Lengkap:</p>
                <p class="text-lg text-gray-900">{{ $pasien->nama_lengkap }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-700">Tanggal Lahir:</p>
                <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-700">No. HP:</p>
                <p class="text-lg text-gray-900">{{ $pasien->no_hp }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-700">Email:</p>
                <p class="text-lg text-gray-900">{{ $pasien->email }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-700">Alamat:</p>
                <p class="text-lg text-gray-900">{{ $pasien->alamat }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-700">Jenis Kelamin:</p>
                <p class="text-lg text-gray-900">{{ $pasien->jenis_kelamin }}</p>
            </div>

            {{-- Data Pesanan --}}
            @if ($latestPesanan)
                <hr class="my-4">

                <div>
                    <p class="text-sm font-medium text-gray-700">Gejala:</p>
                    <p class="text-lg text-gray-900">{{ $latestPesanan->gejala }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700">Riwayat Penyakit:</p>
                    <p class="text-lg text-gray-900">{{ $latestPesanan->riwayat_penyakit }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700">Keluhan:</p>
                    <p class="text-lg text-gray-900">{{ $latestPesanan->keluhan }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700">Jadwal Pemesanan:</p>
                    <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($latestPesanan->jadwal_pemesanan)->translatedFormat('d F Y') }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700">Jenis Layanan:</p>
                    <p class="text-lg text-gray-900">{{ $latestPesanan->jenis_layanan }}</p>
                </div>
            @else
                <div class="text-red-500 font-semibold">Pasien ini belum memiliki data pemesanan.</div>
            @endif

            <div style="display: flex; justify-content: space-between; width: 100%;">
    <button style="display: inline-block; background-color: #4a5568; color: white; padding: 8px 16px; border-radius: 4px; transition: background-color 0.3s;"
            onmouseover="this.style.backgroundColor='#374151'"
            onmouseout="this.style.backgroundColor='#4a5568'">
        Kembali
    </button>
@php
  $pesan = "Permisi Bapak, Anda Memiliki pasien dengan informasi berikut:
  Nama : " . $pasien->nama_lengkap . "
  Jenis Kelamin : " . $pasien->jenis_kelamin . "
  Gejala : " . $latestPesanan->gejala . "
  Riwayat Penyakit : " . $latestPesanan->riwayat_penyakit . "
  Keluhan : " . $latestPesanan->keluhan . "
  Jadwal Pemesanan : " . \Carbon\Carbon::parse($latestPesanan->jadwal_pemesanan)->translatedFormat('d F Y') . "
  Jenis Layanan : " . $latestPesanan->jenis_layanan . "
  Terimakasih";
@endphp
    <a href="https://wa.me/6281278084390?text={{ urlencode($pesan) }}"
    style="display: inline-block; background-color: #3182ce; color: white; padding: 8px 16px; border-radius: 4px; transition: background-color 0.3s;"
            onmouseover="this.style.backgroundColor='#2b6cb0'"
            onmouseout="this.style.backgroundColor='#3182ce'">
        Kirim
    </a>
</div>
        </div>
    </div>
@endsection
