@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pesan Pasien</h2>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-left text-gray-600 text-sm">
                <tr>
<table id="basic-datatables"
                                            class="display table table-striped table-hover text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Id Pasien</th>
													<th>Nama Lengkap</th>
                                                    <th>Id Pesanan</th>
                                                    <th>Gejala</th>
                                                    <th>Riwayat Penyakit</th>
                                                    <th>keluhan Utama</th>
                                                    <th>Jadwal Pesan</th>
                                                     <th>Jenis Layanan</th>
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
            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                @foreach($pesans as $pesan)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium">{{ $pesan->nama }}</td>
                    <td class="px-6 py-4">{{ $pesan->isi }}</td>
                    <td class="px-6 py-4">
                        <form action="{{ route('pesan.reply', $pesan->id) }}" method="POST" class="flex space-x-2 items-center">
                            @csrf
                            <input type="text" name="balasan" placeholder="Balas pesan"
                                   class="border rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-xs">
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded transition">
                                Kirim
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
