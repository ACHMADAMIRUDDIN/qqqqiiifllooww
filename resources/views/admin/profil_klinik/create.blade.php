@extends('admin.dashboard')

@section('content')
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />

<style>
    body {
        background-color: #e6f2ff;
        font-family: 'Segoe UI', sans-serif;
    }

    .container {
        max-width: 600px;
        margin: 30px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #0066cc;
        margin-bottom: 25px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }

    textarea,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #007acc;
        border-radius: 5px;
        margin-bottom: 15px;
        font-size: 14px;
    }

    textarea:focus,
    input[type="file"]:focus {
        outline: none;
        border-color: #005999;
    }

    .btn {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #007acc;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #005999;
    }

    .text-danger {
        color: red;
        font-size: 13px;
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <h2>Tambah Profil Klinik</h2>

    @if(session('error'))
        <p class="text-danger">{{ session('error') }}</p>
    @endif

    <form action="{{ route('admin.profil_klinik.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Deskripsi -->
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Upload Gambar -->
        <label for="gambar">Upload Gambar Klinik (boleh lebih dari satu)</label>
        <input type="file" name="gambar[]" multiple accept="image/*">
        @error('gambar.*')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <!-- Tombol Submit -->
        <button type="submit" class="btn">Simpan Profil</button>
    </form>
</div>
@endsection
