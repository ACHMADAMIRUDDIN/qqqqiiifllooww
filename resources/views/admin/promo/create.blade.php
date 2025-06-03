@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tambah Promo</h2>
    <form method="POST" action="{{ route('promo.store') }}">
        @csrf
        <input type="text" name="judul" placeholder="Judul Promo">
        <input type="number" name="diskon" placeholder="Diskon (%)">
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
