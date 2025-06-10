@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@section('content')
<h2>Admin - Tambah Promo</h2>

@if(session('success'))
  <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('admin.promo.store') }}" method="POST" enctype="multipart/form-data" style="margin-bottom:2em;">
  @csrf
  <div class="mb-3">
    <label class="form-label">Judul Promo</label>
    <input type="text" name="judul" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Gambar Promo</label>
    <input type="file" name="image" accept="image/*" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Upload</button>
</form>

<hr>

<h3>Daftar Gambar Promo</h3>
<div class="row" style="max-width: 700px; margin: 0 auto;">
  @foreach($promoImages as $promo)
    <div class="col-12 mb-4">
      <div class="card" style="border:1px solid #eee; border-radius:12px; box-shadow:0 2px 8px #0001;">
        <div style="position:relative;">
          <img src="{{ asset('storage/' . $promo->image_path) }}"
               alt="promo"
               style="width: 100%; max-width: 600px; height: 320px; object-fit:cover; border-radius:12px 12px 0 0;">
          <div style="position:absolute;bottom:0;left:0;right:0;background:rgba(0,0,0,0.4);color:#fff;padding:0.5em 1em;font-size:1.2em;font-weight:600;border-radius:0 0 12px 12px;">
            {{ $promo->judul }}
          </div>
        </div>
        <div class="card-body text-center">
          <form action="{{ route('admin.promo.destroy', $promo->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus gambar ini?')">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection