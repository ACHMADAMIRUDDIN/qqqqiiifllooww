@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Pasien</h2>

    <form method="POST" action="{{ route('admin.pasien.update', $pasien->id_pasien) }}" class="space-y-4 bg-white p-6 shadow-md rounded-md">
        @csrf
        @method('PUT')

        {{-- Nama Lengkap --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pasien->nama_lengkap) }}"
                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        {{-- Tanggal Lahir --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}"
                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        {{-- No HP --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">No. HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}"
                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $pasien->email) }}"
                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        {{-- Alamat --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $pasien->alamat) }}"
                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        {{-- Jenis Kelamin --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                <option value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Tombol --}}
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
