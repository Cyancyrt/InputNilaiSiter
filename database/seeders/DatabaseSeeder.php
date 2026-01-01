<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dr. Budi Santoso',
            'nidn' => '123456',
            'password' => Hash::make('password123'),
        ]);
        // 1. Tambah Data Mata Kuliah
        $matkul = [
            ['kode_mk' => 'MK01', 'nama_mk' => 'Pemrograman Web', 'sks' => 3, 'semester' => 1, 'prodi' => 'A'],
            ['kode_mk' => 'MK02', 'nama_mk' => 'Basis Data', 'sks' => 3, 'semester' => 1, 'prodi' => 'A'],
            ['kode_mk' => 'MK03', 'nama_mk' => 'Algoritma & Struktur Data', 'sks' => 4, 'semester' => 1, 'prodi' => 'A'],
            ['kode_mk' => 'MK04', 'nama_mk' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 2, 'prodi' => 'A'],
            ['kode_mk' => 'MK05', 'nama_mk' => 'Kecerdasan Buatan', 'sks' => 3, 'semester' => 2, 'prodi' => 'A'],
        ];

        foreach ($matkul as $mk) {
            MataKuliah::create($mk);
        }
        $faker = \Faker\Factory::create('id_ID'); // Menggunakan lokalisasi Indonesia
        
        for ($i = 1; $i <= 10; $i++) {
            Mahasiswa::create([
                'nim'           => '202300' . $i,
                'nama'          => $faker->name,
                'prodi'         => $faker->randomElement(['Informatika', 'Sistem Informasi', 'Teknik Komputer']),
                'angkatan'      => '2023',
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'email'         => $faker->unique()->safeEmail,
                'no_hp'         => '0812' . $faker->numerify('########'),
                'status'        => 'Aktif',
            ]);
        }
    }
}
