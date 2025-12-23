@props(['n'])

<div class="glass-card hover:bg-white/5 transition-all p-5 rounded-3xl grid grid-cols-12 items-center gap-4 group relative overflow-hidden">
    <div class="col-span-5">
        <h4 class="font-bold text-slate-100 group-hover:text-blue-400 transition-colors">{{ $n->mahasiswa->nama }}</h4>
        <p class="text-xs text-slate-500">{{ $n->mataKuliah->nama_mk }} • {{ $n->mahasiswa->nim }}</p>
    </div>

    <div class="col-span-4 flex justify-center gap-2">
        <span class="bg-slate-800 px-2 py-1 rounded-lg text-xs border border-slate-700" title="Tugas">{{ $n->tugas }}</span>
        <span class="bg-slate-800 px-2 py-1 rounded-lg text-xs border border-slate-700" title="UTS">{{ $n->uts }}</span>
        <span class="bg-slate-800 px-2 py-1 rounded-lg text-xs border border-slate-700" title="UAS">{{ $n->uas }}</span>
    </div>

    <div class="col-span-3 flex items-center justify-end gap-3">
        <div class="inline-block px-4 py-1.5 rounded-2xl bg-gradient-to-br from-emerald-500/20 to-teal-500/20 border border-emerald-500/30 text-emerald-400 font-mono font-bold group-hover:hidden transition-all">
            {{ $n->nilai_angka }} <span class="ml-1 text-white">[{{ $n->nilai_huruf }}]</span>
        </div>

        <div class="hidden group-hover:flex items-center gap-2 transition-all">
            <button onclick="openEditModal(@js($n))" class="p-2 bg-blue-500/20 text-blue-400 rounded-xl hover:bg-blue-500 hover:text-white transition-all border border-blue-500/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>

            <form action="{{ route('nilai.destroy', $n->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus nilai ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 bg-red-500/20 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all border border-red-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>