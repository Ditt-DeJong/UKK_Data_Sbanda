<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang Ayah, Bunda & Wali Murid - Data SBANDA</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #f0f7ff; color: #1e293b; overflow-x: hidden; }
        .blob-1 { position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background-color: #dbeafe; border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; z-index: -1; animation: morph 12s ease-in-out infinite; opacity: 0.8;}
        .blob-2 { position: absolute; bottom: 10%; right: -10%; width: 40vw; height: 40vw; background-color: #e0e7ff; border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; z-index: -1; animation: morph 18s ease-in-out infinite reverse; opacity: 0.8;}
        @keyframes morph { 0% { border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; } 50% { border-radius: 70% 30% 50% 50% / 30% 30% 70% 70%; } 100% { border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; } }
        
        .card-friendly { background: #ffffff; border-radius: 2rem; box-shadow: 0 10px 25px rgba(59, 130, 246, 0.08); border: 2px solid #e0e7ff; padding: 2rem; transition: transform 0.3s; }
        .card-friendly:hover { transform: translateY(-3px); border-color: #bfdbfe; }
        
        .btn-friendly { display: inline-flex; align-items: center; justify-content: center; background-color: #2563eb; color: #ffffff; border-radius: 9999px; padding: 1rem 2rem; font-size: 1.125rem; font-weight: 800; box-shadow: 0 8px 15px rgba(37, 99, 235, 0.2); transition: all 0.2s; border: none; }
        .btn-friendly:hover { background-color: #1d4ed8; transform: translateY(-2px); box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3); }
        .btn-friendly-outline { display: inline-flex; align-items: center; justify-content: center; background-color: #ffffff; color: #2563eb; border: 2px solid #2563eb; border-radius: 9999px; padding: 1rem 2rem; font-size: 1.125rem; font-weight: 800; transition: all 0.2s; }
        .btn-friendly-outline:hover { background-color: #eff6ff; transform: translateY(-2px); box-shadow: 0 8px 15px rgba(37, 99, 235, 0.1); }
    </style>
</head>
<body class="selection:bg-blue-200">

    <div class="blob-1"></div>
    <div class="blob-2"></div>

    <nav class="absolute w-full top-0 py-4 px-4 sm:px-8 z-50">
        <div class="w-full flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-3 bg-white/95 backdrop-blur-md px-5 py-2.5 rounded-full shadow-sm border border-blue-200">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <span class="font-black text-lg text-slate-900">SD Bandungrejo 2</span>
            </div>
            
            <div class="flex gap-4">
                <a href="{{ route('login.form') }}" class="px-6 py-2.5 rounded-full bg-white text-blue-700 font-extrabold text-base shadow-sm border-2 border-blue-200 hover:bg-blue-50 transition-colors">
                    Halaman Masuk Profil
                </a>
            </div>
        </div>
    </nav>

    <section class="w-full flex flex-col justify-center items-center px-4 sm:px-8 pt-32 pb-20 text-center relative z-10">
        <div class="w-full mt-10">
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white text-blue-800 font-extrabold text-base mb-6 border border-blue-200 shadow-sm">
                <svg class="w-5 h-5 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg> Halo Ayah, Bunda & Wali Murid
            </div>
            
            <h1 class="text-4xl sm:text-5xl font-black leading-tight text-slate-900 mb-6 tracking-tight">
                Bantu Pantau Kegiatan <br>
                <span class="text-blue-700">Pendidikan Anak Anda</span>
            </h1>
            
            <p class="text-lg sm:text-xl text-slate-700 font-bold w-full mx-auto px-4 mb-10 leading-relaxed">
                Aplikasi pintar ini sengaja dirancang agar mempermudah Ayah & Bunda melihat kehadiran harian anak serta mengajukan surat izin sakit langsung dari genggaman HP.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="{{ route('register.form') }}" class="w-full sm:w-auto btn-friendly relative z-20">
                    Mulai Daftar Sekarang
                </a>
                <a href="#panduan" class="w-full sm:w-auto btn-friendly-outline relative z-20">
                    Lihat Cara Pakai Web Ini
                </a>
            </div>
        </div>
    </section>

    <!-- Fitur & Panduan Section -->
    <section id="panduan" class="py-20 px-4 sm:px-8 bg-white/80 backdrop-blur-xl relative z-10 border-t border-blue-100">
        <div class="w-full">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-black text-slate-900 mb-3">Keuntungan Menggunakan Aplikasi Ini</h2>
                <p class="text-lg text-slate-700 font-bold">Cukup tekan tombol, beres seketika.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="card-friendly bg-white text-center md:text-left">
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mb-5 mx-auto md:mx-0 shadow-sm border border-blue-200">
                        <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Lihat Presensi Anak Otomatis</h3>
                    <p class="text-base text-slate-700 font-bold leading-relaxed">Anda tidak perlu lagi mereka-reka apakah anak tiba di sekolah dengan selamat. Pantau jejak kehadirannya dengan nyaman dari HP setiap hari.</p>
                </div>

                <div class="card-friendly bg-white text-center md:text-left">
                    <div class="w-16 h-16 rounded-full bg-emerald-100 flex items-center justify-center mb-5 mx-auto md:mx-0 shadow-sm border border-emerald-200">
                        <svg class="w-8 h-8 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Buat Surat Izin Tanpa Menulis</h3>
                    <p class="text-base text-slate-700 font-bold leading-relaxed">Hindari kerepotan membuat surat kertas atau mengirim WA ke banyak guru. Pilih alasan, kirim di aplikasi, dan seluruh guru seketika menerima notifikasinya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Super Friendly -->
    <footer class="py-10 bg-white w-full relative z-10 border-t border-slate-200 text-center px-4 sm:px-8">
        <h2 class="text-xl font-black text-slate-900 mb-3">SD Bandungrejo 2 Kab. Malang</h2>
        <p class="text-base text-slate-700 font-bold mb-6 w-full px-4 mx-auto">Pendidikan semakin erat, komunikasi antar sekolah dan orang tua kini lebih lancar tanpa kendala.</p>
        <a href="{{ route('login.form') }}" class="btn-friendly mb-8 shadow-sm">Buka Halaman Masuk Utama</a>
        
        <div class="h-1 bg-slate-200 w-24 mx-auto mb-4 rounded-full"></div>
        <p class="text-sm text-slate-600 font-bold">&copy; 2025 Portal Resmi Wali Murid SD Bandungrejo 2</p>
    </footer>

</body>
</html>
