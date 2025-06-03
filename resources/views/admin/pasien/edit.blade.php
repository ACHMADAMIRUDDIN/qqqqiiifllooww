@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Pasien</h2>
    <form method="POST" action="{{ route('pasien.update', $pasien) }}">
        @csrf
        @method('PUT')

        <input type="text" name="nama" placeholder="Nama" value="{{ old('nama_lengkap', $pasien->nama) }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email', $pasien->email) }}">
        <input type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat', $pasien->alamat) }}">
        <input type="text" name="no_telp" placeholder="No. Telp" value="{{ old('no_telp', $pasien->no_telp) }}">

        <button type="submit">Update</button>
    </form>
</div>
@endsection
