@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Daftar Pemesanan</h2>
    <table>
        <tr><th>Pasien</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr>
        @foreach($pemesanan as $pesanan)
        <tr>
            <td>{{ $pesanan->pasien->nama }}</td>
            <td>{{ $pesanan->tanggal }}</td>
            <td>{{ $pesanan->status }}</td>
            <td>
                @if($pesanan->status !== 'terkonfirmasi')
                <form action="{{ route('pemesanan.konfirmasi', $pesanan->id) }}" method="POST">
                    @csrf
                    <button type="submit">Konfirmasi</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
