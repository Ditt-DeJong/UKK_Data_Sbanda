<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Menunggu Verifikasi Admin - Data Sbanda</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
      body { font-family: 'Poppins', sans-serif; }
      h1, h2, h3, h4, .btn-futuristic { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gradient-animated relative flex flex-col justify-center items-center">
    
    {{-- Decorative Background Elements --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="orb orb-cyan w-96 h-96 -top-48 -left-48 opacity-20"></div>
        <div class="orb orb-blue w-80 h-80 top-1/3 -right-40 opacity-15"></div>
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto px-4 py-8 relative z-10 max-w-2xl">
        <div class="card-futuristic p-8 lg:p-12 text-center animate-slide-up">
            
            <div class="flex justify-center mb-6">
                <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center animate-pulse">
                    <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <h1 class="text-3xl font-bold text-gray-800 mb-4">Pendaftaran Sedang Diverifikasi</h1>
            
            @if(Auth::user()->dataSiswa && Auth::user()->dataSiswa->status_approval === 'rejected')
                <div class="bg-red-50 text-red-700 p-4 rounded-xl border border-red-200 mb-6 text-left">
                    <h3 class="font-bold flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Mohon Maaf, Data Anda Ditolak
                    </h3>
                    <p class="mt-2 text-sm">{{ Auth::user()->dataSiswa->alasan_penolakan ?? 'Ada kesalahan pada data yang Anda kirim. Harap perbaiki.' }}</p>
                </div>
            @else
                <p class="text-gray-500 mb-8 leading-relaxed">
                    Terima kasih telah melengkapi data pendaftaran Ananda. Saat ini kami sedang memproses data tersebut. 
                    <br><br>
                    <strong>Mohon menunggu hingga Guru Kelas 6 memverifikasi data Anda.</strong> Silakan cek halaman ini beberapa saat lagi secara berkala.
                </p>
            @endif

            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                <button onclick="window.location.reload();" class="btn-futuristic py-3 px-8 text-base">
                    Cek Status Sekarang
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="py-3 px-8 text-base font-semibold text-gray-500 hover:text-gray-800 transition-colors bg-gray-100 hover:bg-gray-200 rounded-xl w-full sm:w-auto">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
