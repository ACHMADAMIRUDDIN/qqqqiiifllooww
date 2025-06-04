<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id_pesanan
 * @property string $gejala
 * @property string|null $riwayat_penyakit
 * @property string $keluhan
 * @property string $jadwal_pemesanan
 * @property string $jenis_layanan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pasien|null $pasien
 * @method static \Database\Factories\PesananFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan whereGejala($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan whereIdPesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan whereJadwalPemesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan whereJenisLayanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan whereKeluhan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan whereRiwayatPenyakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pesanan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
