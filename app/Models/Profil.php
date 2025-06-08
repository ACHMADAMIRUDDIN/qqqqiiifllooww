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
class Profil extends Model
{
    use HasFactory;
    protected $table = 'profil_kliniks';

    protected $fillable = ['nama_klinik', 'deskripsi'];
}
