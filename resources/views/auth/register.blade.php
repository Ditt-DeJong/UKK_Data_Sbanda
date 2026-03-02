<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Register - Data Sbanda</title>
    @vite(['resources/js/app.js', 'resources/js/toggle.js'])
    <style>
      body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-animated py-8 relative">
    
    {{-- Decorative Background Elements --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="orb orb-cyan w-96 h-96 -top-48 -right-48 opacity-30"></div>
        <div class="orb orb-blue w-80 h-80 bottom-1/4 -left-40 opacity-20"></div>
        <div class="orb orb-cyan w-64 h-64 top-20 left-1/3 opacity-25"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    {{-- Main Card --}}
    <div class="w-full max-w-5xl mx-4 glass-card rounded-3xl shadow-2xl grid grid-cols-1 md:grid-cols-2 overflow-hidden animate-scale-in relative z-10">
        
        {{-- Bagian Kiri: Form Register --}}
        <div class="p-8 lg:p-12 flex flex-col justify-center bg-white/95 backdrop-blur-xl">
            {{-- Logo --}}
            <div class="flex items-center gap-3 mb-6 animate-fade-in">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg glow-blue-sm">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3ZM18.82 9L12 12.72L5.18 9L12 5.28L18.82 9ZM17 15.99L12 18.72L7 15.99V12.27L12 15L17 12.27V15.99Z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-gradient">Data Sbanda</span>
            </div>

            {{-- Welcome Text --}}
            <div class="mb-6 animate-fade-in" style="animation-delay: 0.1s">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    Buat Akun Baru 🎉
                </h2>
                <p class="text-gray-500">Daftar untuk memantau perkembangan anak Anda</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                
                {{-- Nama --}}
                <div class="animate-fade-in" style="animation-delay: 0.15s">
                    <label for="name" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Nama sebagai Wali
                    </label>
                    <input type="text" name="name" id="nama" placeholder="Masukkan nama lengkap anda"
                           class="input-futuristic w-full">
                </div>
                
                {{-- Email --}}
                <div class="animate-fade-in" style="animation-delay: 0.2s">
                    <label for="email" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Email
                    </label>
                    <input type="email" name="email" id="email" placeholder="contoh@gmail.com"
                           class="input-futuristic w-full">
                </div>
                
                {{-- Password --}}
                <div class="animate-fade-in" style="animation-delay: 0.25s">
                    <label for="password" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Minimal 8 karakter"
                               class="input-futuristic w-full pr-12">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-blue-500 transition-colors">
                            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18m-2.121-4.879A9 9 0 0112 21a9 9 0 01-9-9 9 9 0 012.879-6.121M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Tombol Daftar --}}
                <div class="animate-fade-in" style="animation-delay: 0.3s">
                    <button type="submit" class="btn-futuristic w-full py-4 text-lg flex items-center justify-center gap-3">
                        <span>Daftar Sekarang</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>
            </form>

            {{-- Links --}}
            <div class="mt-6 space-y-4 animate-fade-in" style="animation-delay: 0.35s">
                <p class="text-center text-gray-600">
                    Sudah memiliki akun? 
                    <a href="{{ route('login') }}" class="font-semibold text-blue-500 hover:text-blue-600 transition-colors">Masuk Sekarang</a>
                </p>
                <p class="text-center text-xs text-gray-400">
                    Dengan mendaftar, Anda menyetujui 
                    <a href="#" class="text-blue-500 hover:underline">Kebijakan Privasi</a> & 
                    <a href="#" class="text-blue-500 hover:underline">Syarat Penggunaan</a>
                </p>
            </div>
        </div>
        
        {{-- Bagian Kanan: Ilustrasi --}}
        <div class="hidden md:flex flex-col justify-center items-center text-white p-12 relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-500 to-cyan-500">
            {{-- Pattern overlay --}}
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 30px 30px;"></div>
            
            {{-- Decorative circles --}}
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-20 -right-20 w-48 h-48 bg-cyan-300/20 rounded-full blur-2xl"></div>
            
            <div class="relative z-10 text-center">
                <div class="w-24 h-24 bg-white/20 rounded-3xl flex items-center justify-center mx-auto mb-8 backdrop-blur-sm animate-float">
                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                
                <h2 class="text-3xl font-bold mb-4 text-glow-white">Bergabung Sekarang</h2>
                <p class="text-white/90 text-lg max-w-xs mx-auto leading-relaxed">
                    Daftarkan diri Anda dan mulai pantau perkembangan anak dengan mudah dan transparan
                </p>
                
                {{-- Benefits --}}
                <div class="mt-10 space-y-3 text-left">
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl p-3">
                        <div class="w-8 h-8 bg-emerald-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-sm">Pantau kehadiran real-time</span>
                    </div>
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl p-3">
                        <div class="w-8 h-8 bg-emerald-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-sm">Ajukan izin dengan mudah</span>
                    </div>
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl p-3">
                        <div class="w-8 h-8 bg-emerald-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-sm">Lihat jadwal pelajaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>