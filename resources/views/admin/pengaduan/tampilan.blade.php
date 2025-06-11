@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
@section('content')
<div class="container py-4">
    <h2 class="h4 fw-bold text-dark mb-4">Daftar Pengaduan Pengguna</h2>
    <div class="table-responsive bg-black">
        <table class="table table-striped table-hover text-center align-middle">
           <thead class="bg-ocean-blue text-black">
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Tanggal Lahir</th>
                    <th>No. Handphone</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Pekerjaan</th>
                    <th>Jenis Layanan</th>
                    <th>Tanggal Layanan</th>
                    <th>Kritik/Saran</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengaduans as $pengaduan)
                <tr>
                    <td>{{ $pengaduan->nama_lengkap }}</td>
                    <td>{{ $pengaduan->tanggal_lahir }}</td>
                    <td>{{ $pengaduan->no_handphone }}</td>
                    <td>{{ $pengaduan->alamat_email }}</td>
                    <td>{{ $pengaduan->jenis_kelamin }}</td>
                    <td>{{ $pengaduan->usia }}</td>
                    <td>{{ $pengaduan->pekerjaan }}</td>
                    <td>{{ $pengaduan->jenis_layanan }}</td>
                    <td>{{ $pengaduan->tanggal_layanan }}</td>
                    <td>{{ $pengaduan->kritik_saran }}</td>
                    <td>{{ $pengaduan->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
