@extends('admin.dashboard')

@section('content')
<div class="container py-4">
    <h2>Daftar Berita</h2>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-success mb-3">Tambah Berita</a>
    <table class="table">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>PDF</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beritas as $berita)
            <tr>
                <td>
                    @if($berita->thumbnail)
                        <img src="{{ asset('storage/'.$berita->thumbnail) }}" style="max-width:80px;">
                    @endif
                </td>
                <td>{{ $berita->judul }}</td>
                <td>{{ $berita->deskripsi }}</td>
                <td>
                    <a href="{{ asset('storage/'.$berita->pdf_path) }}" target="_blank" class="btn btn-primary btn-sm">Baca PDF</a>
                </td>
                <td>
                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
