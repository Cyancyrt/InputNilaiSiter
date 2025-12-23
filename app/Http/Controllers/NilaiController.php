<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        return view('dashboard', [
            'all_mahasiswa' => \App\Models\Mahasiswa::all(),
            'all_mk'        => \App\Models\MataKuliah::all(),
            'nilai'         => \App\Models\Nilai::with(['mahasiswa', 'mataKuliah'])
                                ->latest()
                                ->paginate(5), // Menggunakan pagination
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id'   => 'required|exists:mahasiswas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'tugas'          => 'required|numeric|between:0,100',
            'uts'            => 'required|numeric|between:0,100',
            'uas'            => 'required|numeric|between:0,100',
        ]);

        // 2. Logika Perhitungan (Bobot: 30% Tugas, 30% UTS, 40% UAS)
        $angka = ($request->tugas * 0.3) + ($request->uts * 0.3) + ($request->uas * 0.4);

        // 3. Konversi ke Nilai Huruf
        if ($angka >= 85) {
            $huruf = 'A';
        } elseif ($angka >= 75) {
            $huruf = 'B';
        } elseif ($angka >= 60) {
            $huruf = 'C';
        } elseif ($angka >= 45) {
            $huruf = 'D';
        } else {
            $huruf = 'E';
        }

        // 4. Simpan ke Database
        Nilai::create([
            'mahasiswa_id'   => $request->mahasiswa_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'tugas'          => $request->tugas,
            'uts'            => $request->uts,
            'uas'            => $request->uas,
            'nilai_angka'    => $angka,
            'nilai_huruf'    => $huruf,
        ]);

        return redirect()->back()->with('success', 'Data nilai berhasil dikalkulasi dan disimpan.');
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|numeric|between:0,100',
            'uts'   => 'required|numeric|between:0,100',
            'uas'   => 'required|numeric|between:0,100',
        ]);

        $nilai = Nilai::findOrFail($id);
        
        // Kalkulasi ulang
        $angka = ($request->tugas * 0.3) + ($request->uts * 0.3) + ($request->uas * 0.4);
        
        // Konversi huruf
        if ($angka >= 85) $huruf = 'A';
        elseif ($angka >= 75) $huruf = 'B';
        elseif ($angka >= 60) $huruf = 'C';
        elseif ($angka >= 45) $huruf = 'D';
        else $huruf = 'E';

        $nilai->update([
            'tugas' => $request->tugas,
            'uts'   => $request->uts,
            'uas'   => $request->uas,
            'nilai_angka' => $angka,
            'nilai_huruf' => $huruf,
        ]);

        return redirect()->back()->with('success', 'Nilai berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Data nilai berhasil dihapus!');
    }
}
