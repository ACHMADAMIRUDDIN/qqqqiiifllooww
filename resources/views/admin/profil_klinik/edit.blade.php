@extends('admin.dashboard')

@section('content')
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
<style>
    .container {
        padding: 2rem;
        max-width: 900px;
        margin: auto;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .gambar-wrapper {
        margin-top: 1rem;
    }

    .gambar-item {
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .gambar-item img {
        max-width: 200px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    .btn {
        padding: 0.4rem 0.8rem;
        font-size: 14px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-sm {
        font-size: 12px;
        padding: 0.3rem 0.6rem;
    }

    em {
        color: #888;
    }
</style>

<div class="container">
    <div class="header">
        <h1>Profil Klinik</h1>
        @if (!$profil_klinik)
            <a href="{{ route('admin.profil_klinik.create') }}" class="btn btn-primary">Tambah Profil</a>
        @endif
    </div>

    @if ($profil_klinik)
        <p>{{ $profil_klinik->deskripsi }}</p>

        <h4>Gambar Klinik</h4>
        <div class="gambar-wrapper">
            @forelse ($profil_klinik->gambarKlinik as $gambar)
                <div class="gambar-item">
                    <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="Foto Klinik">
                    <form action="{{ route('admin.gambar_klinik.destroy', $gambar->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            @empty
                <p><em>Belum ada gambar.</em></p>
            @endforelse
        </div>
    @endif
</div>
@endsection
