@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Jadwal Dokter</h2>
    <form method="POST" action="{{ route('admin.jadwal.update', $jadwal->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" value="{{ old('nama_dokter', $jadwal->nama_dokter) }}" required>
        </div>
        <div class="mb-3">
            <label>Jenis Terapi</label>
            <input type="text" name="jenis_terapi" class="form-control" value="{{ old('jenis_terapi', $jadwal->jenis_terapi) }}" required>
        </div>
        <div class="mb-3">
            <label>Jadwal</label>
            <input type="text" name="jadwal" class="form-control" value="{{ old('jadwal', $jadwal->jadwal) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
