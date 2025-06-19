@extends('admin.dashboard')

@section('content')
<div class="container py-4">
    <h2>Upload Berita (PDF)</h2>
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi Singkat</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>File PDF</label>
            <input type="file" name="pdf" class="form-control" accept="application/pdf" required>
        </div>
        <div class="mb-3">
            <label>Thumbnail (jpg, jpeg, png, opsional)</label>
            <input type="file" name="thumbnail" class="form-control" accept="image/png,image/jpeg">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
