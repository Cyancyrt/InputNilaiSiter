<header class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-emerald-400">
            Sistem Input Nilai Terpadu
        </h1>
        <p class="text-slate-400 mt-1">Dosen: <span class="text-slate-200">{{ Auth::user()->nama }}</span></p>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="glass-card hover:bg-red-500/20 text-red-400 px-6 py-2 rounded-full transition-all flex items-center gap-2 border border-red-500/30">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Keluar
        </button>
    </form>
</header>