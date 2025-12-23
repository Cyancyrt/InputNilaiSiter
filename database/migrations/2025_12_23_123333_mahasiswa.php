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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();
            $table->string('nama');
            $table->string('prodi');
            $table->year('angkatan'); // Tipe data khusus tahun (YYYY)
            $table->enum('jenis_kelamin', ['L', 'P']); // Membatasi input Laki-laki atau Perempuan
            $table->string('email')->unique();
            $table->string('no_hp', 15)->nullable();
            
            // Status: Aktif, Cuti, Lulus, Drop-out, dll. Default: Aktif
            $table->string('status')->default('Aktif'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
