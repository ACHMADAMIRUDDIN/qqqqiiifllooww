@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
<table id="basic-datatables"
                                            class="display table table-striped table-hover text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>ID</th>
													<th>Nama Lengkap</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>No HP</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Gejala</th>
                                                    <th>Riwayat Penyakit</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>-</td>
													<td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>

                                                    <td class="action-buttons">
                                                        <button class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>-</td>
													<td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>

                                                    <td class="action-buttons">
                                                        <button class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>-</td>
													<td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td class="action-buttons">
                                                        <button class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
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
