<x-layout title="SISTER | Dashboard Dosen">
    <x-header />

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <x-form-input :mahasiswa="$all_mahasiswa" :matkul="$all_mk" />

        <main class="lg:col-span-8">
            <div class="space-y-4">
                <div class="grid grid-cols-12 px-6 py-3 text-xs font-bold uppercase tracking-widest text-slate-500">
                    <div class="col-span-5">Mahasiswa & Mata Kuliah</div>
                    <div class="col-span-4 text-center">Komponen (T|U|U)</div>
                    <div class="col-span-3 text-right">Hasil Akhir</div>
                </div>

                @forelse($nilai as $n)
                    <x-nilai-row :n="$n" />
                @empty
                    <div class="glass-card p-10 text-center rounded-3xl text-slate-500">
                        Belum ada data nilai.
                    </div>
                @endforelse

                <div class="mt-10 flex justify-center">
                   {{-- GUNAKAN INI --}}
                    <x-pagination :paginator="$nilai" />
                </div>
            </div>
        </main>
    </div>
    <x-modal-edit />
</x-layout>