<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'gejala',
        'riwayat_penyakit',
        'keluhan',
        'jadwal_pemesanan',
        'jenis_layanan',
    ];

    // ONE-TO-ONE ke Pasien
    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id_pesanan', 'id_pesanan');
    }
}
