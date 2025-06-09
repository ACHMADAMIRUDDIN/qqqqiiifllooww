@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="container py-4">
    <form method="POST" action="{{ route('admin.dokter.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto Profil</label>
            <input type="file" name="foto" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto Detail</label>
            <input type="file" name="foto_detail" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Keterangan Detail</label>
            <textarea name="keterangan_detail" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
