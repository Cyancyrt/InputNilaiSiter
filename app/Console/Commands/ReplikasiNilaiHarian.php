<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Nilai;
// use App\Models\NilaiLog; // Contoh jika ingin direplikasi ke tabel lain

class ReplikasiNilaiHarian extends Command
{
    // Nama command yang akan dipanggil
    protected $signature = 'nilai:replikasi-harian';

    // Deskripsi command
    protected $description = 'Melakukan replikasi data nilai ke tabel riwayat harian';

    public function handle()
    {
        $this->info('Memulai proses replikasi...');

        // Contoh Logika: Mengambil data yang dibuat hari ini dan memprosesnya
        $dataHariIni = Nilai::whereDate('created_at', today())->get();

        foreach ($dataHariIni as $item) {
            // Jalankan logika replikasi Anda di sini
            // Contoh: Simpan ke tabel log atau kirim ke database lain
            $this->info("Memproses data ID: {$item->id}");
        }

        $this->info('Replikasi selesai dengan sukses.');
    }
}