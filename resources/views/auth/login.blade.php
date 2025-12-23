<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dosen | Sistem Input Nilai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="flex items-center justify-center p-6">

    <div class="w-full max-w-md" x-data="{ showPass: false }">
        <div class="bg-white/20 backdrop-blur-lg border border-white/30 rounded-3xl shadow-2xl p-8">
            
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/30 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white tracking-tight">Portal Dosen</h2>
                <p class="text-indigo-100 mt-2 text-sm">Silahkan masuk untuk mengelola nilai mahasiswa</p>
            </div>

            @if($errors->any())
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-xl flex items-center gap-3 text-red-100 text-sm animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-white text-sm font-medium mb-2 ml-1">NIDN</label>
                    <input type="text" name="nidn" value="{{ old('nidn') }}" required
                        class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-indigo-200 focus:outline-none focus:ring-2 focus:ring-white/50 transition-all shadow-inner"
                        placeholder="Masukkan nomor induk dosen">
                </div>

                <div class="relative">
                    <label class="block text-white text-sm font-medium mb-2 ml-1">Password</label>
                    <div class="relative">
                        <input :type="showPass ? 'text' : 'password'" name="password" required
                            class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-indigo-200 focus:outline-none focus:ring-2 focus:ring-white/50 transition-all shadow-inner"
                            placeholder="••••••••">
                        
                        <button type="button" @click="showPass = !showPass" 
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-white/70 hover:text-white transition-colors">
                            <svg x-show="!showPass" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="showPass" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                <path d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" 
                    class="w-full py-3 bg-white text-indigo-600 font-bold rounded-xl shadow-lg hover:bg-indigo-50 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                    Masuk Sekarang
                </button>
            </form>
        </div>

        <p class="text-center text-white/60 mt-8 text-xs uppercase tracking-widest">
            &copy; 2024 Portal Akademik Kampus
        </p>
    </div>

</body>
</html>