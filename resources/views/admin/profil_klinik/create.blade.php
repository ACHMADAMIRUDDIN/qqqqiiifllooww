@extends('admin.dashboard')

@section('content')
<div class="container">
    <h2>Tambah Profil Klinik</h2>

    @if(session('error'))
        <p class="text-danger">{{ session('error') }}</p>
    @endif

    <form action="{{ route('admin.profil_klinik.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <label for="gambar">Upload Gambar Klinik (boleh lebih dari satu)</label>
        <input type="file" name="gambar[]" multiple accept="image/*">
        @error('gambar.*')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn">Simpan Profil</button>
    </form>
</div>
@endsection
