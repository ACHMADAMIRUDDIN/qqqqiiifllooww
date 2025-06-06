<?php

// namespace Database\Seeders;

// use App\Models\User;
// // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash;

// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Seed the application's database.
//      */
//     public function run(): void
//     {
//         // User::factory(10)->create();

//         User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
//         User::create([
//             'name' => 'Admin Klinik',
//             'email' => 'admin@example.com',
//             'password' => Hash::make('password'),
//             'role' => 'admin'
//         ]);
//     }
// }
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
    //     Pesanan::factory(10)->create()->each(function ($pesanan) {
    //     Pasien::factory()->create([
    //         'id_pesanan' => $pesanan->id_pesanan,
    //     ]);
    // });

    User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
