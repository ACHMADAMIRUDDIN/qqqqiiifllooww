@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Daftar Promo</h2>
    <a href="{{ route('promo.create') }}">Tambah Promo</a>
    <table>
        <tr><th>Judul</th><th>Diskon</th><th>Aksi</th></tr>
        @foreach($promos as $promo)
        <tr>
            <td>{{ $promo->judul }}</td>
            <td>{{ $promo->diskon }}%</td>
            <td>
                <a href="{{ route('promo.edit', $promo) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
