<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_handphone');
            $table->string('alamat_email');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('usia')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('jenis_layanan')->nullable();
            $table->date('tanggal_layanan')->nullable();
            $table->text('kritik_saran');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
