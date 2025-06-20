@extends('admin.dashboard')

{{-- Fonts & Icons --}}
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />

{{-- Tailwind & Font Awesome --}}
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script> {{-- Ganti dengan ID kamu jika pakai FontAwesome Pro --}}

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">✏️ Edit Data Pasien</h2>

    <form method="POST" action="{{ route('admin.pasien.update', $pasien->id_pasien) }}"
        class="grid grid-cols-1 gap-6 bg-white p-8 shadow-xl rounded-lg border border-gray-100">
        @csrf
        @method('PUT')

        @php $latestPesanan = $pasien->pesanan->last(); @endphp

        {{-- Nama --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">👤 Nama Lengkap</label>
            <input required type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pasien->nama_lengkap) }}"
                class="input-text">
        </div>

        {{-- Tanggal Lahir --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">📅 Tanggal Lahir</label>
            <input required type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}"
                class="input-text">
        </div>

        {{-- No HP --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">📱 No. HP</label>
            <input required type="text" name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}"
                class="input-text">
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">📧 Email</label>
            <input required type="email" name="email" value="{{ old('email', $pasien->email) }}"
                class="input-text">
        </div>

        {{-- Alamat --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">🏠 Alamat</label>
            <input required type="text" name="alamat" value="{{ old('alamat', $pasien->alamat) }}"
                class="input-text">
        </div>

        {{-- Jenis Kelamin --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">⚥ Jenis Kelamin</label>
            <select required name="jenis_kelamin" class="input-select">
                <option value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Gejala --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">🤒 Gejala</label>
            <input required type="text" name="gejala" value="{{ old('gejala', $latestPesanan->gejala ?? '') }}"
                class="input-text">
        </div>

        {{-- Riwayat Penyakit --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">📋 Riwayat Penyakit</label>
            <input required type="text" name="riwayat_penyakit" value="{{ old('riwayat_penyakit', $latestPesanan->riwayat_penyakit ?? '') }}"
                class="input-text">
        </div>

        {{-- Keluhan --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">🗣️ Keluhan</label>
            <input required type="text" name="keluhan" value="{{ old('keluhan', $latestPesanan->keluhan ?? '') }}"
                class="input-text">
        </div>

        {{-- Jadwal --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">🗓️ Jadwal Pemesanan</label>
            <input required type="datetime-local" name="jadwal_pemesanan"
                value="{{ old('jadwal_pemesanan', isset($latestPesanan->jadwal_pemesanan) ? \Carbon\Carbon::parse($latestPesanan->jadwal_pemesanan)->format('Y-m-d\TH:i') : '') }}"
                class="input-text">
        </div>

        {{-- Jenis Layanan --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">💆‍♀️ Jenis Layanan</label>
            <select required name="jenis_layanan" class="input-select">
                <option value="Akupunture" {{ old('jenis_layanan', $latestPesanan->jenis_layanan ?? '') == 'Akupunture' ? 'selected' : '' }}>Akupunture</option>
                <option value="Akupresure" {{ old('jenis_layanan', $latestPesanan->jenis_layanan ?? '') == 'Akupresure' ? 'selected' : '' }}>Akupresure</option>
                <option value="Bekam" {{ old('jenis_layanan', $latestPesanan->jenis_layanan ?? '') == 'Bekam' ? 'selected' : '' }}>Bekam</option>
                <option value="Pijat" {{ old('jenis_layanan', $latestPesanan->jenis_layanan ?? '') == 'Pijat' ? 'selected' : '' }}>Pijat</option>
            </select>
        </div>

        {{-- Persetujuan --}}
        <div class="flex items-center space-x-2">
            <input type="checkbox" name="persetujuan" id="persetujuan"
                class="rounded text-blue-600 focus:ring-blue-500">
            <label for="persetujuan" class="text-sm text-gray-700">Saya telah mengisi data dengan benar</label>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.pasien.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded transition">← Kembali</a>

            <button type="submit"
                onclick="return validateCheck()"
                class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition">
                💾 Simpan Perubahan
            </button>
        </div>
    </form>
</div>

{{-- Styles Tailwind Utility --}}
<style>
    .input-text {
        @apply w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200;
    }

    .input-select {
        @apply w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200;
    }
</style>

{{-- JS Validasi --}}
<script>
    function validateCheck() {
        const cek = document.getElementById('persetujuan');
        if (!cek.checked) {
            alert('Silakan centang persetujuan terlebih dahulu.');
            return false;
        }
        return true;
    }
</script>
@endsection
