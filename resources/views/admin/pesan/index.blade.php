@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Data Pesanan Pasien</h2>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-left text-gray-600 text-sm">
                <tr>

                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                @foreach($pasiens as $pasien)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $pasien->id_pasien }}</td>
                        <td class="px-6 py-4">{{ $pasien->nama_lengkap }}</td>
                        <td class="px-6 py-4">{{ $pasien->pesanan->id_pesanan ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $pasien->pesanan->gejala ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $pasien->pesanan->riwayat_penyakit ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $pasien->pesanan->keluhan ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $pasien->pesanan->jadwal_pemesanan ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $pasien->pesanan->jenis_layanan ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
