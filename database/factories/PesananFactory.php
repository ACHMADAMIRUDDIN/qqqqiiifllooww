<?php
namespace Database\Factories;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesananFactory extends Factory
{
    protected $model = Pesanan::class;

    public function definition(): array
    {
        return [
            'gejala' => $this->faker->sentence,
            'riwayat_penyakit' => $this->faker->optional()->sentence,
            'keluhan' => $this->faker->sentence,
            'jadwal_pemesanan' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'jenis_layanan' => $this->faker->randomElement(['Rawat Jalan', 'Konsultasi Online', 'Home Care']),
        ];
    }
}
