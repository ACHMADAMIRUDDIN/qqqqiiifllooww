<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class PasienWithpemesananExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $sevenDaysAgo = Carbon::now()->subDays(7);

        return Pesanan::with('pasien')
            ->where('created_at', '>=', $sevenDaysAgo)
            ->get()
            ->map(function ($pesanan) {
                $pasien = $pesanan->pasien;

                return [
                    'Nama Lengkap'      => $pasien->nama_lengkap ?? '-',
                    'Tanggal Lahir'     => $pasien->tanggal_lahir ?? '-',
                    'No HP'             => $pasien->no_hp ?? '-',
                    'Email'             => $pasien->email ?? '-',
                    'Alamat'            => $pasien->alamat ?? '-',
                    'Jenis Kelamin'     => $pasien->jenis_kelamin ?? '-',

                    'Gejala'            => $pesanan->gejala ?? '-',
                    'Riwayat Penyakit'  => $pesanan->riwayat_penyakit ?? '-',
                    'Keluhan'           => $pesanan->keluhan ?? '-',
                    'Jadwal Pemesanan'  => $pesanan->jadwal_pesanan ?? '-',
                    'Jenis Layanan'     => $pesanan->jenis_layanan ?? '-',
                    'ID Pasien'         => $pesanan->id_pasien ?? '-',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Tanggal Lahir',
            'No HP',
            'Email',
            'Alamat',
            'Jenis Kelamin',
            'Gejala',
            'Riwayat Penyakit',
            'Keluhan',
            'Jadwal Pemesanan',
            'Jenis Layanan',
            'ID Pasien',
        ];
    }
}
