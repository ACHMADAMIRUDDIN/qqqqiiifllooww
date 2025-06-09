@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Profil Dokter</h2>
    <form method="POST" action="{{ route('admin.dokter.update', $dokter->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $dokter->nama) }}" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required>{{ old('keterangan', $dokter->keterangan) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Foto Profil</label>
            <input type="file" name="foto" class="form-control">
            @if($dokter->foto)
                <img src="{{ asset('storage/'.$dokter->foto) }}" width="100" class="mt-2">
            @endif
        </div>
        <div class="mb-3">
            <label>Foto Detail</label>
            <input type="file" name="foto_detail" class="form-control">
            @if($dokter->foto_detail)
                <img src="{{ asset('storage/'.$dokter->foto_detail) }}" width="100" class="mt-2">
            @endif
        </div>
        <div class="mb-3">
            <label>Keterangan Detail</label>
            <textarea name="keterangan_detail" class="form-control">{{ old('keterangan_detail', $dokter->keterangan_detail) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
