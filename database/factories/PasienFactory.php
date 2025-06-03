<?php

namespace Database\Factories;

use App\Models\Pasien;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    protected $model = Pasien::class;

    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name,
            'tanggal_lahir' => $this->faker->date(),
            'no_hp' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'alamat' => $this->faker->address,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'id_pesanan' => Pesanan::factory(), // One-to-one
        ];
    }
}
