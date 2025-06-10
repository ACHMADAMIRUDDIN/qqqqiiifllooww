@extends('admin.dashboard')

@section('content')
<div class="container py-4">
    <h2>Tambah Gambar untuk {{ $profil_klinik->nama ?? 'Klinik' }}</h2>

    <form action="{{ route('admin.gambar_klinik.store', $profil_klinik->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="gambar" class="form-label">Pilih Gambar</label>
            <input class="form-control" type="file" name="gambar" id="gambar" required>
            @error('gambar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
        <a href="{{ route('admin.profil_klinik.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
