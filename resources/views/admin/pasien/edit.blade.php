@extends('admin.dashboard')

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Pasien</h2>

        <form method="POST" action="{{ route('admin.pasien.update', $pasien->id_pasien) }}"
            class="space-y-4 bg-white p-6 shadow-md rounded-md">
            @csrf
            @method('PUT')

            @php
                $latestPesanan = $pasien->pesanan->last();
            @endphp

            {{-- Nama Lengkap --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input required type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pasien->nama_lengkap) }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            {{-- Tanggal Lahir --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input required type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            {{-- No HP --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">No. HP</label>
                <input required type="text" name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input required type="email" name="email" value="{{ old('email', $pasien->email) }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <input required type="text" name="alamat" value="{{ old('alamat', $pasien->alamat) }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select required name="jenis_kelamin"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                    <option value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Gejala --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Gejala</label>
                <input required type="text" name="gejala" value="{{ old('gejala', $latestPesanan->gejala ?? '') }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            {{-- Riwayat Penyakit --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Riwayat Penyakit</label>
                <input required type="text" name="riwayat_penyakit"
                    value="{{ old('riwayat_penyakit', $latestPesanan->riwayat_penyakit ?? '') }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            {{-- Keluhan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Keluhan</label>
                <input required type="text" name="keluhan" value="{{ old('keluhan', $latestPesanan->keluhan ?? '') }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            {{-- Keluhan Utama
            <div>
                <label class="block text-sm font-medium text-gray-700">Keluhan Utama</label>
                <input required type="text" name="keluhan_utama"
                    value="{{ old('keluhan_utama', $latestPesanan->keluhan_utama ?? '') }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div> --}}

            {{-- Jadwal Pemesanan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Jadwal Pemesanan</label>
                <input required type="datetime-local" name="jadwal_pemesanan"
                    value="{{ old('jadwal_pemesanan', isset($latestPesanan->jadwal_pemesanan) ? \Carbon\Carbon::parse($latestPesanan->jadwal_pemesanan)->format('Y-m-d\TH:i') : '') }}"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            {{-- Jenis Layanan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Jenis Layanan</label>
                <select required name="jenis_layanan"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                    <option value="Akupunture" {{ old('jenis_layanan', $latestPesanan->jenis_layanan ?? '') == 'Akupunture' ? 'selected' : '' }}>Akupunture</option>
                    <option value="Akupresure" {{ old('jenis_layanan', $latestPesanan->jenis_layanan ?? '') == 'Akupresure' ? 'selected' : '' }}>Akupresure</option>
                    <option value="Bekam" {{ old('jenis_layanan', $latestPesanan->jenis_layanan ?? '') == 'Bekam' ? 'selected' : '' }}>Bekam</option>
                    <option value="Pijat" {{ old('jenis_layanan', $latestPesanan->jenis_layanan ?? '') == 'Pijat' ? 'selected' : '' }}>Pijat</option>
                </select>
            </div>

            {{-- Persetujuan --}}
            <div class="flex items-center">
                <input required type="checkbox" name="persetujuan" id="persetujuan"
                    class="mr-2 border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
                <label for="persetujuan" class="text-sm text-gray-700">Centang Saja</label>
            </div>

            {{-- Tombol --}}
            <div>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
