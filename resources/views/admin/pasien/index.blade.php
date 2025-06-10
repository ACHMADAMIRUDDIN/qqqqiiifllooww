@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <h1 style="font-size: 48px; font-weight: 700; color: #1f2937;">Data Pasien</h1>

            <a href="{{ route('admin.export') }}"
                style="background-color: #28a745; color: white; padding: 8px 16px; border-radius: 8px; font-size: 14px; text-decoration: none; transition: 0.2s;">
                ⬇️ Export Excel 7 Hari Terakhir
            </a>
        </div>


        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div id="basic-datatables" class="overflow-x-auto bg-white shadow-md rounded-lg">

            <table class="min-w-full table-auto display table table-striped table-hover text-center">
                <thead class="bg-gray-100 text-gray-700 table-dark">
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Tanggal Lahir</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-800">
                    @foreach ($pasiens as $pasien)
                        <tr class="hover:bg-gray-50">
                            <td>{{ $pasien->id_pasien }}</td>
                            <td>{{ $pasien->nama_lengkap }}</td>
                            <td>{{ $pasien->tanggal_lahir }}</td>
                            <td>{{ $pasien->no_hp }}</td>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                            <td>{{ $pasien->email }}</td>
                            <td
                                style="display: flex; justify-content: center; gap: 12px; align-items: center; padding: 8px;">
                                <form action="{{ route('admin.pasien.edit', $pasien) }}" method="GET">
                                    <button
                                        style="background-color: #facc15; color: white; padding: 4px 6px; border-radius: 6px; font-size: 12px; transition: background-color 0.2s ease;"
                                        onmouseover="this.style.backgroundColor='#eab308';"
                                        onmouseout="this.style.backgroundColor='#facc15';">Edit</button>
                                </form>
                                <form action="{{ route('admin.pasien.destroy', $pasien) }}" method="POST"
                                    onsubmit="return confirm('Hapus?')">
                                    @csrf @method('DELETE')
                                    <button
                                        style="background-color: #fa1515; color: white; padding: 0.25rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; transition: background-color 0.2s ease;"
                                        onmouseover="this.style.backgroundColor='#b91c1c';"
                                        onmouseout="this.style.backgroundColor='#fa1515';">Hapus</button>
                                </form>
                                <form action="{{ route('admin.pasien.show', $pasien) }}" method="GET">
                                    <button
                                        style="background-color: #3b82f6; color: white; padding: 0.25rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; transition: background-color 0.2s ease;"
                                        onmouseover="this.style.backgroundColor='#2563eb';"
                                        onmouseout="this.style.backgroundColor='#3b82f6';">Detail</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
