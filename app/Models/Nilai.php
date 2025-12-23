<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nilai extends Model
{
    protected $fillable = [
        'mahasiswa_id', 
        'mata_kuliah_id', 
        'tugas', 
        'uts', 
        'uas', 
        'nilai_angka', 
        'nilai_huruf'
    ];

    // Mengambil data mahasiswa pemilik nilai ini
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    // Mengambil data mata kuliah dari nilai ini
    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}
