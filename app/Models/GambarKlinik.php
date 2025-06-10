<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Profil_klinik;

class GambarKlinik extends Model
{
    use HasFactory;
    protected $table = 'gambar_klinik';

    protected $fillable = ['profil_klinik_id', 'gambar'];

    public function profilKlinik()
    {
        return $this->belongsTo(Profil_klinik::class, 'profil_klinik_id', 'id');
    }
}
