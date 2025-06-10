<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('image_path'); // Pastikan kolom ini ada
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};

// Migration sudah benar, tapi tabel promos belum ada di database.
// Jalankan perintah berikut di terminal/project root:
// php artisan migrate
//
// atau jika ingin hanya migration promos saja:
// php artisan migrate --path=database/migrations/2025_05_27_185228_create_promos_table.php
//
// Tidak perlu perubahan kode pada migration, hanya jalankan migrasi agar tabel promos tercipta.
