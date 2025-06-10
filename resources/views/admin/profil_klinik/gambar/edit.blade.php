@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Edit Gambar Klinik</h1>

    <form action="{{ route('gambar_klinik.update', $gambar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <p>Gambar Saat Ini:</p>
            <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="Gambar Klinik" style="max-width: 200px;">
        </div>

        <div class="mt-3">
            <label for="gambar">Ganti Gambar:</label><br>
            <input type="file" name="gambar" id="gambar" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
