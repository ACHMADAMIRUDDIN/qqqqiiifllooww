<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profil query()
 * @mixin \Eloquent
 */
class Profil_klinik extends Model
{
    use HasFactory;
    protected $table = 'profil_kliniks';

    protected $fillable = ['deskripsi'];

    public function gambarKlinik()
    {
        return $this->hasMany(GambarKlinik::class, 'profil_klinik_id', 'id');
    }
}
