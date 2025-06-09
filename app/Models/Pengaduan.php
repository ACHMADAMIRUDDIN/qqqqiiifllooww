<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'tanggal_lahir',
        'no_handphone',
        'alamat_email',
        'jenis_kelamin',
        'usia',
        'pekerjaan',
        'jenis_layanan',
        'tanggal_layanan',
        'kritik_saran',
    ];
}
