<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliahs'; 
    
    protected $fillable = ['kode_mk', 'nama_mk', 'sks'];

    // Relasi: Satu mata kuliah bisa diambil banyak mahasiswa (di tabel nilai)
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
}
