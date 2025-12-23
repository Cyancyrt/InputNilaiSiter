<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Nilai;

class ReplikasiNilaiHarian extends Command
{
    protected $signature = 'nilai:replikasi-harian';
    protected $description = 'Menarik data terbaru dari VPS Master ke Local Slave';

    public function handle()
    {
        $this->info('--- Memulai Replikasi Jam 24.00 ---');

        try {
            // 1. Ambil data dari koneksi 'vps_master' (Database VPS)
            // Pastikan koneksi ini sudah ada di config/database.php
            $dataMaster = DB::connection('mysql_master')
                            ->table('nilais')
                            ->get();

            $this->info("Ditemukan " . $dataMaster->count() . " data di Master.");

            // 2. Masukkan ke database Lokal (Slave)
            foreach ($dataMaster as $row) {
                // Menggunakan updateOrInsert agar data yang sudah ada diupdate, 
                // dan data yang belum ada ditambah (mencegah duplikat ID)
                DB::table('nilais')->updateOrInsert(
                    ['id' => $row->id], // Kunci unik
                    (array) $row        // Data lainnya
                );
            }

            $this->info('Replikasi Master ke Slave berhasil disinkronkan.');
            
        } catch (\Exception $e) {
            $this->error('Gagal melakukan replikasi: ' . $e->getMessage());
        }
    }
}