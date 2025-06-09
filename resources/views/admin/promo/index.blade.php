@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<h2>Admin - Tambah Promo</h2>

@if(session('success'))
  <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('admin.promo.store') }}" method="POST" enctype="multipart/form-data" style="margin-bottom:2em;">
  @csrf
  <div>
    <label>Judul Promo</label>
    <input type="text" name="judul" required>
  </div>
  <div>
    <label>Gambar Promo</label>
    <input type="file" name="image" accept="image/*" required>
  </div>
  <button type="submit">Upload</button>
</form>

<hr>

<h3>Daftar Gambar Promo</h3>
<div class="carousel-container" style="max-width: 500px; margin: 0 auto;">
  <div class="carousel-slide" id="promoSlide" style="display: flex; overflow-x: auto; gap: 16px; padding: 10px 0;">
    @php
      $promoImages = $promoImages ?? \App\Models\Promo::all();
    @endphp
    @foreach($promoImages as $promo)
      <div class="carousel-item" style="flex: 0 0 auto;">
        <img src="{{ asset('storage/' . $promo->image_path) }}" alt="promo" style="width: 180px; height: 120px; object-fit:cover; border: 1px solid #ccc; border-radius: 8px; cursor: pointer;" onclick="openLightbox(this)">
        <div style="font-weight:600;text-align:center;margin-top:0.5em;">{{ $promo->judul }}</div>
        <form action="{{ route('promo.destroy', $promo->id) }}" method="POST" style="display: block; margin-top: 8px;">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Yakin hapus gambar ini?')">Hapus</button>
        </form>
      </div>
    @endforeach
  </div>
</div>

{{-- Optional: Lightbox Modal --}}
<div id="lightbox" style="display:none;position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.8);justify-content:center;align-items:center;">
  <img id="lightbox-img" src="" style="max-width:90vw;max-height:90vh;border-radius:12px;box-shadow:0 4px 32px #000a;">
</div>
<script>
  function openLightbox(img) {
    document.getElementById('lightbox-img').src = img.src;
    document.getElementById('lightbox').style.display = 'flex';
  }
  document.getElementById('lightbox').onclick = function() {
    this.style.display = 'none';
  }
</script>
@endsection