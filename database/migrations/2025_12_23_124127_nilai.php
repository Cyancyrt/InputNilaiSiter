<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('mata_kuliah_id')->constrained()->onDelete('cascade');
            
            // Komponen Nilai
            $table->integer('tugas');
            $table->integer('uts');
            $table->integer('uas');
            
            // Hasil Akhir
            $table->decimal('nilai_angka', 5, 2); // Contoh: 85.50
            $table->char('nilai_huruf', 2);       // Contoh: A, B+
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
