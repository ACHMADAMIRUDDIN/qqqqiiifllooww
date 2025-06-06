@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Promo</h2>
    <form method="POST" action="{{ route('promo.update', $promo) }}">
        @csrf
        @method('PUT')
        <input type="text" name="judul" value="{{ old('judul', $promo->judul) }}">
        <input type="number" name="diskon" value="{{ old('diskon', $promo->diskon) }}">
        <button type="submit">Update</button>
    </form>
</div>
@endsection
