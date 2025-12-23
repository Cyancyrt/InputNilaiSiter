@props(['mahasiswa', 'matkul'])

<aside {{ $attributes->merge(['class' => 'lg:col-span-4']) }}>
    <div class="glass-card p-6 rounded-3xl sticky top-8">
        <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
            <span class="w-2 h-6 bg-blue-500 rounded-full"></span>
            Input Data Nilai
        </h3>
        <form action="{{ route('nilai.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-xs text-slate-400 uppercase tracking-widest ml-1">Mahasiswa</label>
                <select name="mahasiswa_id" class="w-full mt-1 bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">Pilih Mahasiswa</option>
                    @foreach($mahasiswa as $m)
                        <option value="{{ $m->id }}">{{ $m->nim }} - {{ $m->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-xs text-slate-400 uppercase tracking-widest ml-1">Mata Kuliah</label>
                <select name="mata_kuliah_id" class="w-full mt-1 bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">Pilih Mata Kuliah</option>
                    @foreach($matkul as $mk)
                        <option value="{{ $mk->id }}">{{ $mk->nama_mk }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-3 gap-3">
                @foreach(['tugas', 'uts', 'uas'] as $field)
                <div>
                    <label class="text-[10px] text-slate-400 uppercase">{{ strtoupper($field) }}</label>
                    <input type="number" name="{{ $field }}" class="w-full mt-1 bg-slate-800/50 border border-slate-700 rounded-xl px-3 py-2 text-center text-white focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
                @endforeach
            </div>

            <button type="submit" class="w-full mt-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 py-4 rounded-2xl font-bold shadow-lg shadow-blue-900/20 transition-all active:scale-95">
                Simpan & Kalkulasi
            </button>
        </form>
    </div>
</aside>