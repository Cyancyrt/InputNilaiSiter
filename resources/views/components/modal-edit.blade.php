<div id="modalEdit" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <div class="relative flex min-h-screen items-center justify-center p-4">
        <div class="glass-card w-full max-w-md rounded-3xl p-8 shadow-2xl border border-white/20">
            <h3 class="text-2xl font-bold mb-6 flex items-center gap-2 text-white">
                <span class="w-2 h-6 bg-blue-500 rounded-full"></span>
                Edit Nilai Mahasiswa
            </h3>

            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div class="p-4 bg-white/5 rounded-2xl border border-white/10 mb-4">
                    <p id="editNama" class="font-bold text-blue-400"></p>
                    <p id="editMk" class="text-xs text-slate-400"></p>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    @foreach(['tugas', 'uts', 'uas'] as $field)
                    <div>
                        <label class="text-xs text-slate-400 uppercase tracking-widest ml-1">{{ $field }}</label>
                        <input type="number" name="{{ $field }}" id="input_{{ $field }}" 
                            class="w-full mt-1 bg-slate-800 border border-slate-700 rounded-xl px-3 py-2 text-center text-white focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    @endforeach
                </div>

                <div class="flex gap-3 mt-8">
                    <button type="button" onclick="closeEditModal()" 
                        class="flex-1 px-6 py-3 rounded-2xl font-bold text-slate-300 hover:bg-white/5 transition-all">
                        Batal
                    </button>
                    <button type="submit" 
                        class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 py-3 rounded-2xl font-bold shadow-lg transition-all active:scale-95">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>