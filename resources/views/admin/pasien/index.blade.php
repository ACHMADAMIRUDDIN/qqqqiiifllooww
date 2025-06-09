@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <table id="basic-datatables" class="display table table-striped table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No HP</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Gejala</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
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
                                        <td class="px-4 py-3">{{ $pasien->email }}</td>
                                        <td class="px-4 py-3">{{ $pasien->alamat }}</td>
                                        <td class="px-4 py-3 flex space-x-2">
                                            <button href="{{ route('admin.pasien.edit', $pasien) }}"
                                                style="background-color: #facc15; color: white; padding: 0.25rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; transition: background-color 0.2s ease;"
                                                onmouseover="this.style.backgroundColor='#eab308';"
                                                onmouseout="this.style.backgroundColor='#facc15';">Edit</button>
                                            <form action="{{ route('admin.pasien.destroy', $pasien) }}" method="POST"
                                                onsubmit="return confirm('Hapus?')">
                                                @csrf @method('DELETE')
                                                <button
                                                    style="background-color: #fa1515; color: white; padding: 0.25rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; transition: background-color 0.2s ease;"
                                                    onmouseover="this.style.backgroundColor='#b91c1c'
                                                    ;"
                                                    onmouseout="this.style.backgroundColor='#fa1515';"">Hapus</button>
                                            </form>
                                            <button href=""
                                                style="background-color: #3b82f6; color: white; padding: 0.25rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; transition: background-color 0.2s ease;"
                                                onmouseover="this.style.backgroundColor='#2563eb';"
                                                onmouseout="this.style.backgroundColor='#3b82f6';">Detail</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

        </div>
    </div>
@endsection
