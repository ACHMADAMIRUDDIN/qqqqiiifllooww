<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $nama
 * @property string $jadwal
 * @property int $dikonfirmasi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pasien|null $pasien
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pemesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pemesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pemesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pemesanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pemesanan whereDikonfirmasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pemesanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pemesanan whereJadwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pemesanan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pemesanan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'tanggal', 'status'];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }
}
