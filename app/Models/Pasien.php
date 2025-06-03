<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
