<?php

namespace App\Exports;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class PasienWithPemesananExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $sevenDaysAgo = Carbon::now()->subDays(7);

        return Pemesanan::with('pasien')
            ->where('created_at', '>=', $sevenDaysAgo)
            ->get()
            ->map(function ($pemesanan) {
                $pasien = $pemesanan->pasien;

                return [
                    'Gejala'            => $pemesanan->gejala ?? '-',
                    'Riwayat Penyakit'  => $pemesanan->riwayat_penyakit ?? '-',
                    'Keluhan'           => $pemesanan->keluhan ?? '-',
                    'Jadwal Pemesanan'  => $pemesanan->jadwal_pemesanan ?? '-',
                    'Jenis Layanan'     => $pemesanan->jenis_layanan ?? '-',
                    'ID Pasien'         => $pemesanan->id_pasien ?? '-',

                    'Nama Lengkap'      => $pasien->nama_lengkap ?? '-',
                    'Tanggal Lahir'     => $pasien->tanggal_lahir ?? '-',
                    'No HP'             => $pasien->no_hp ?? '-',
                    'Email'             => $pasien->email ?? '-',
                    'Alamat'            => $pasien->alamat ?? '-',
                    'Jenis Kelamin'     => $pasien->jenis_kelamin ?? '-',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Gejala',
            'Riwayat Penyakit',
            'Keluhan',
            'Jadwal Pemesanan',
            'Jenis Layanan',
            'ID Pasien',
            'Nama Lengkap',
            'Tanggal Lahir',
            'No HP',
            'Email',
            'Alamat',
            'Jenis Kelamin',
        ];
    }
}
