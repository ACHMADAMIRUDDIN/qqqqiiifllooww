@extends('layouts.app')

@section('content')
    <div class="w-full max-w-2xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg mt-6">
        <h1 class="text-2xl font-semibold mb-6 text-gray-800">
            {{ isset($pasien) ? 'Edit Pasien' : 'Tambah Pasien' }}
        </h1>

        <form action="{{ isset($pasien) ? route('admin.pasien.update', $pasien) : route('admin.pasien.store') }}"
            method="POST" class="space-y-6">
            @csrf
            @if (isset($pasien))
                @method('PUT')
            @endif

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $pasien->nama ?? '') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    required>{{ old('alamat', $pasien->alamat ?? '') }}</textarea>
            </div>

            <div>
                <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $pasien->no_telp ?? '') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <div>
                <label for="umur" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $pasien->email ?? '') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
                <div class="flex justify-end mt-6 mb-4 pr-2">
                    <button type="submit" onMouseOver="this.style.backgroundColor='#3E7B27'" onMouseOut="this.style.backgroundColor='#85A947'"
                        style="background-color: #85A947; color: white; font-weight: bold; transition: background-color 0.3s ease; border-radius: 8px; padding: 8px 16px;">
                        Simpan
                    </button>
                </div>

            </form>
            <div class="sticky bottom-4 flex justify-end mt-3 pr-2">
                <button type="submit" onmouseover="this.style.backgroundColor='#CD1818'" onmouseout="this.style.backgroundColor='#F15A59'"
                    style="background-color: #F15A59; color: white; font-weight: bold; hover:bg-red-700; transition: background-color 0.3s ease; border-radius: 8px; padding: 8px 16px;">
                    Cancel
                </button>
            </div>
    </div>
@endsection
