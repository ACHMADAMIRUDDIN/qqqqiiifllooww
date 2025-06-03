@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Pasien</h1>
        {{-- <a href="{{ route('admin.pasien.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Tambah</a> --}}
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Nama Lengkap</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Tanggal Lahir</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">No HP</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Jenis Kelamin</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Gejala</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Riwayat Penyakit</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach ($pasiens as $pasien)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $pasien->id_pasien }}</td>
                    <td class="px-4 py-3">{{ $pasien->nama_lengkap }}</td>
                    <td class="px-4 py-3">{{ $pasien->tanggal_lahir }}</td>
                    <td class="px-4 py-3">{{ $pasien->no_hp }}</td>
                    <td class="px-4 py-3">{{ $pasien->jenis_kelamin }}</td>
                    <td class="px-4 py-3">{{ $pasien->pesanan->gejala ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $pasien->pesanan->riwayat_penyakit ?? '-' }}</td>
                    <td class="px-4 py-3 flex space-x-2">
                        <a href="{{ route('admin.pasien.edit', $pasien) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm transition">Edit</a>
                        <form action="{{ route('admin.pasien.destroy', $pasien) }}" method="POST" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
