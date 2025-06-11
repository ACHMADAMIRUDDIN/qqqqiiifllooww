@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
@section('content')
<div class="container py-4">
    <form method="POST" action="{{ route('admin.jadwal.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Terapi</label>
            <input type="text" name="jenis_terapi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jadwal</label>
            <input type="text" name="jadwal" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
