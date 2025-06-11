@extends('admin.dashboard')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />

@section('content')
    <div class="container py-4">
        <div>
            <h1>Profil Klinik</h1>

            @if (!$profil_klinik)
                <a href="{{ route('admin.profil_klinik.create') }}" class="btn btn-primary">Tambah Profil</a>
            @endif
        </div>

        <div>
            @if ($profil_klinik)
                <p>{{ $profil_klinik->deskripsi }}</p>

                <h4>Gambar Klinik</h4>

                {{-- Tombol Tambah Gambar --}}
                <a href="{{ route('admin.gambar_klinik.create', $profil_klinik->id) }}" class="btn btn-success btn-sm mb-3">
                    Tambah Gambar
                </a>

                @forelse ($profil_klinik->gambarKlinik as $gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="Foto Klinik"
                            style="max-width: 200px; cursor: pointer;" data-bs-toggle="modal"
                            data-bs-target="#modalGambar{{ $gambar->id }}">
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalGambar{{ $gambar->id }}" tabindex="-1"
                        aria-labelledby="gambarModalLabel{{ $gambar->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="gambarModalLabel{{ $gambar->id }}">Gambar Klinik</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="Foto Klinik Besar"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.gambar_klinik.destroy', $gambar->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    {{-- Edit gambar ini jika kamu buat routenya --}}
                    <a href="{{ route('admin.gambar_klinik.edit', $gambar->id) }}" class="btn btn-primary btn-sm">Edit</a>
        </div>
    @empty
        <p><em>Belum ada gambar.</em></p>
        @endforelse
        @endif
    </div>
    </div>
@endsection
