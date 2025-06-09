@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="container py-4">
    <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokters as $dokter)
            <tr>
                <td><img src="{{ asset('storage/'.$dokter->foto) }}" width="80"></td>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->keterangan }}</td>
                <td>
                    <a href="{{ route('admin.dokter.edit', $dokter) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.dokter.destroy', $dokter) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                    <a href="{{ route('detailprofil', $dokter->id) }}" class="btn btn-info btn-sm" target="_blank">Lihat Profil</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
