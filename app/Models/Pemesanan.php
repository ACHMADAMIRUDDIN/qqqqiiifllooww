<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'tanggal', 'status'];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }
}
