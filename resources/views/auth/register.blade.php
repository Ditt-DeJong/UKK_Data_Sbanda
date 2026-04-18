<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Baru - Data SBANDA</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="flex min-h-screen bg-[#f0f7ff] font-['Nunito'] text-slate-800 antialiased overflow-hidden">
    
    {{-- Left Side (Image & Branding) - Hidden on Mobile --}}
    <div id="branding-panel"
        class="hidden lg:flex lg:w-1/2 relative flex-col justify-center px-12 py-10 bg-blue-900 border-r border-blue-800/30 overflow-hidden transition-all duration-500">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/siswa.jpeg') }}" alt="Background" class="w-full h-full object-cover" />
            <div id="spotlight-overlay" class="absolute inset-0 bg-blue-900/95 mix-blend-multiply transition-all duration-100 ease-out pointer-events-none" style="--posX: 50%; --posY: 50%; -webkit-mask-image: radial-gradient(circle 350px at var(--posX) var(--posY), transparent 0%, rgba(0,0,0,0.4) 40%, black 80%); mask-image: radial-gradient(circle 350px at var(--posX) var(--posY), transparent 0%, rgba(0,0,0,0.4) 40%, black 80%);"></div>
        </div>

        {{-- Content over image --}}
        <div class="relative z-10 text-white mt-auto mb-auto pointer-events-none">
            <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/30 mb-8 shadow-lg pointer-events-auto">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            
            <p class="text-blue-200 font-bold tracking-widest text-sm mb-2 uppercase">Selamat Datang di Sistem Kami</p>
            <h1 class="text-4xl lg:text-5xl font-black mb-6 leading-tight drop-shadow-md">Data SBANDA <br><span class="text-blue-300">Portal Orang Tua</span></h1>
            
            <p class="text-lg text-blue-100/90 leading-relaxed max-w-md drop-shadow">
                Sistem informasi dan pemantauan absensi terintegrasi untuk memudahkan orang tua dalam memantau kegiatan akademik anak di sekolah.
            </p>
        </div>

        <div class="relative z-10 text-blue-200/80 text-sm mt-auto font-medium pointer-events-none">
            &copy; {{ date('Y') }} Data Sbanda. All rights reserved.
        </div>
    </div>

    {{-- Right Side (Form) --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 relative overflow-hidden bg-[#f8fafc]">
        
        {{-- Decorative Blob on Right Side (Subtle) --}}
        <div class="absolute top-[-10%] right-[-10%] w-[40vw] h-[40vw] bg-indigo-100 rounded-[40%_60%_70%_30%/40%_50%_60%_50%] -z-10 opacity-60 blur-[60px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[30vw] h-[30vw] bg-blue-100/60 rounded-[60%_40%_30%_70%/60%_30%_70%_40%] -z-10 opacity-60 blur-[40px] pointer-events-none"></div>

        <div class="w-full max-w-md relative z-10">

            <div class="text-center mb-6">
                <h1 class="text-3xl font-black text-slate-900 mb-1 tracking-tight">Pendaftaran Baru</h1>
                <p class="text-lg text-slate-700 font-bold">Harap Isi Dengan Benar</p>
            </div>

            <div class="bg-white rounded-[1.5rem] shadow-[0_10px_25px_rgba(37,99,235,0.05)] border-2 border-indigo-100 p-8 relative z-10">
                <form action="{{ route('register') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label class="block text-lg font-bold text-slate-900 mb-2 px-1">Nama Bapak / Ibu</label>
                        <input type="text" name="name" class="w-full bg-slate-50 border-2 border-slate-300 rounded-full px-5 py-3.5 text-base font-bold text-slate-900 transition-all duration-200 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/15 placeholder:text-slate-500 placeholder:font-semibold" placeholder="Contoh: Budi Santoso" required>
                    </div>

                    <div>
                        <label class="block text-lg font-bold text-slate-900 mb-2 px-1">Alamat Email Aktif</label>
                        <input type="email" name="email" class="w-full bg-slate-50 border-2 border-slate-300 rounded-full px-5 py-3.5 text-base font-bold text-slate-900 transition-all duration-200 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/15 placeholder:text-slate-500 placeholder:font-semibold" placeholder="Contoh: budi@gmail.com" required>
                        @error('email')
                            <div class="mt-2 px-4 py-2 bg-red-50 border border-red-200 rounded-xl text-red-700 font-bold text-base flex items-center gap-2">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-lg font-bold text-slate-900 mb-2 px-1">Buat Kata Sandi Baru</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" class="w-full bg-slate-50 border-2 border-slate-300 rounded-full px-5 py-3.5 text-base font-bold text-slate-900 transition-all duration-200 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/15 placeholder:text-slate-500 placeholder:font-semibold pr-12" placeholder="Ketik sandi rahasia..." required>
                            <button type="button" onclick="const p=document.getElementById('password'); p.type = p.type === 'password' ? 'text' : 'password';" class="absolute inset-y-0 right-1.5 flex items-center justify-center p-2 text-slate-500 hover:text-blue-700 transition-colors focus:outline-none bg-slate-100 rounded-full h-9 w-9 my-auto">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="flex w-full items-center justify-center bg-blue-600 text-white rounded-full p-4 text-lg font-extrabold shadow-[0_6px_15px_rgba(37,99,235,0.2)] transition-all duration-200 hover:bg-blue-700 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(37,99,235,0.3)] border-none cursor-pointer text-center">
                            Daftar Sistem
                        </button>
                    </div>
                </form>
            </div>

            <div class="text-center mt-6 p-4 bg-white rounded-2xl border border-blue-100 shadow-sm">
                <p class="text-base font-bold text-slate-700">Sudah pernah mendaftar?</p>
                <a href="{{ route('login') }}" class="inline-block mt-2 text-emerald-700 hover:text-emerald-900 bg-emerald-50 px-5 py-2 rounded-full hover:bg-emerald-100 font-bold transition-colors text-base">Langsung Masuk</a>
            </div>

        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const panel = document.getElementById('branding-panel');
            const overlay = document.getElementById('spotlight-overlay');

            if (panel && overlay) {
                // Throttle mousemove with requestAnimationFrame for smooth performance
                let isTicking = false;
                
                panel.addEventListener('mousemove', (e) => {
                    if (!isTicking) {
                        window.requestAnimationFrame(() => {
                            const rect = panel.getBoundingClientRect();
                            const x = e.clientX - rect.left;
                            const y = e.clientY - rect.top;
                            
                            // Set variable for mask position
                            overlay.style.setProperty('--posX', `${x}px`);
                            overlay.style.setProperty('--posY', `${y}px`);
                            
                            isTicking = false;
                        });
                        isTicking = true;
                    }
                });

                panel.addEventListener('mouseleave', () => {
                    // Reset to center slowly when left
                    overlay.style.transition = 'all 0.5s ease';
                    overlay.style.setProperty('--posX', `50%`);
                    overlay.style.setProperty('--posY', `50%`);
                    
                    setTimeout(() => {
                        overlay.style.transition = 'all 0.1s ease-out';
                    }, 500);
                });
            }
        });
    </script>
</body>
</html>