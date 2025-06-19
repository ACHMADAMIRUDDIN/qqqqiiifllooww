@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
@section('content')

<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-center">
            <div class="stat-card" style="background:#fff;border-radius:16px;box-shadow:0 2px 12px #0001;padding:32px 24px 24px 24px;min-width:220px;max-width:320px;text-align:center;display:flex;flex-direction:column;align-items:center;">
                <i class="bi bi-journal-check" style="font-size:2.4em;color:#2563eb;margin-bottom:0.3em;"></i>
                <div class="stat-number" style="font-size:2.8em;font-weight:700;color:#2563eb;margin-bottom:0.2em;letter-spacing:1px;">
                    {{ $totalPemesanan ?? ($pesanans->count() ?? 0) }}

                </div>
                <div class="stat-label" style="font-size:1.1em;color:#2563eb;font-weight:500;margin-top:0.2em;">
                    Total Pemesanan
                </div>
            </div>
        </div>
    </div>
    <h2 class="h4 fw-bold text-dark mb-4">Daftar Pemesanan Layanan</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover text-center align-middle">
            <thead class="bg-primary text-white">
                <tr>

                    <th>Nama Pemesan</th>
                    <th>Gejala</th>
                    <th>Riwayat Penyakit</th>
                    <th>Keluhan</th>
                    <th>Jadwal Pemesanan</th>
                    <th>Jenis Layanan</th>

                    <th>Waktu Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanans as $pesanan)
                <tr>

                    <td>
                        {{-- Tampilkan nama pemesan dari relasi pasien --}}
                        {{ $pesanan->pasien->nama_lengkap ?? '-' }}
                    </td>
                    <td>{{ $pesanan->gejala }}</td>
                    <td>{{ $pesanan->riwayat_penyakit }}</td>
                    <td>{{ $pesanan->keluhan }}</td>
                    <td>{{ $pesanan->jadwal_pemesanan }}</td>
                    <td>{{ $pesanan->jenis_layanan }}</td>
                    <td>{{ $pesanan->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
