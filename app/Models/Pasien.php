<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id_pasien
 * @property string $nama_lengkap
 * @property string $tanggal_lahir
 * @property string $no_hp
 * @property string $email
 * @property string $alamat
 * @property string $jenis_kelamin
 * @property int $id_pesanan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pesanan $pesanan
 * @method static \Database\Factories\PasienFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereIdPasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereIdPesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pasien whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pasien extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pasien';

    protected $fillable = [
        'nama_lengkap',
        'tanggal_lahir',
        'no_hp',
        'email',
        'alamat',
        'jenis_kelamin',
        'id_pesanan',
    ];

    // ONE-TO-ONE ke Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }
}
