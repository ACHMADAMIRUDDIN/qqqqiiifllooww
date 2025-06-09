@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="container py-4">
    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Dokter</th>
                <th>Jenis Terapi</th>
                <th>Jadwal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwals as $jadwal)
            <tr>
                <td>{{ $jadwal->nama_dokter }}</td>
                <td>{{ $jadwal->jenis_terapi }}</td>
                <td>{{ $jadwal->jadwal }}</td>
                <td>
                    <a href="{{ route('admin.jadwal.edit', $jadwal) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.jadwal.destroy', $jadwal) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
