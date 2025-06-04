@extends('layouts.app')

@section('content')
<div class="text-center py-20">
    <h1 class="text-4xl font-bold text-red-600 mb-4">403 - Akses Ditolak</h1>
    <p class="text-gray-700 text-lg">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    <p class="mt-4 text-sm text-gray-500">Anda akan diarahkan ke beranda dalam 1 detik...</p>
</div>

<script>
    setTimeout(function () {
        window.location.href = "{{ route('beranda') }}";
    }, 1000); // 1 detik = 1000 ms
</script>
@endsection
