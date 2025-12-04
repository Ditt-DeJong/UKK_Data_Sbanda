<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Register Page</title>
    @vite(['resources/js/app.js', 'resources/js/toggle.js'])
</head>
<body class="bg-gradient-to-r from-blue-600 to-blue-200 py-2">
  <div class="flex items-center justify-center">
        <div class="w-full max-w-5xl bg-white rounded-2xl shadow-lg grid grid-cols-1 my-8 md:grid-cols-2 gap-6 overflow-hidden">
            
            {{-- Bagian Kiri: Form Login --}}
            <div class="p-8 flex flex-col justify-center py-2">
                <h1 class="text-lg font-semibold pt-4 text-blue-600">Data Sbanda</h1>
                <h2 class="text-2xl md:text-3xl font-bold mt-4 text-center">
                    Selamat Datang di <br><span class="text-blue-600">Data Sbanda</span>
                    {{-- Hi, Selamat Datang <br>--}}
                </h2>
                <p class="text-gray-500 mt-2 text-center">Silahkan isi data berikut ini terlebih dahulu</p>

                <form action="{{ route('register') }}" method="POST" class="mt-6 space-y-4">
                    @csrf
                    {{-- Nama --}}
                    <div>
                        <label for="name" class="block font-semibold">Nama sebagai Wali:</label>
                        <input type="text" name="name" id="nama" placeholder="masukkan nama lengkap anda"
                            class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    {{-- Email --}}
                    <div>
                        <label for="email" class="block font-semibold">Email:</label>
                        <input type="email" name="email" id="email" placeholder="contoh: akun@gmail.com"
                            class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    {{-- Password --}}
                    <div>
                        <label for="password" class="block font-semibold">Password:</label>
                        <div class="relative mt-1">
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            {{-- Ikon Mata --}}
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                            <!-- Mata Tertutup -->
                            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18m-2.121-4.879A9 9 0 0112 21a9 9 0 01-9-9 9 9 0 012.879-6.121M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                            <!-- Mata Terbuka -->
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        </div>
                    </div>

                    {{-- Tombol Login --}}
                    <button type="submit"
                            class="w-full flex items-center justify-between bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <span class="flex justify-items-start pb-1.5 pl-3 text-5xl">←</span>
                        <span class="font-semibold text-xl">Daftar</span>
                        <span class="flex justify-items-end pb-1.5 pr-3 text-5xl">→</span>
                    </button>
                </form>

                <p class="mt-4 text-sm">
                     Sudah memiliki akun? 
                    <a href="{{ route('login') }}" class="font-semibold underline text-blue-500">Masuk Sekarang.</a>
                </p>

                <p class="mt-4 text-xs text-gray-500">
                    Dengan Mengisi Form ini, Saya telah menyetujui Kebijakan Privasi & Syarat Penggunaan 
                    <a href="#" class="text-blue-600">Data Sbanda</a>
                </p>
            </div>
            
            {{-- Bagian Kanan: Ilustrasi --}}
            <div class="bg-blue-600 bg-cover bg-center flex flex-col justify-center items-center text-white py-2 relative" 
            style="background-image: url({{ asset("build/assets/image/pattern.png") }})">
                <h2 class="text-xl md:text-2xl font-bold underline">Portal Orang Tua</h2>
                <p class="mt-4 text-center italic text-lg">
                    “Bantu perkembangan anak anda secara optimal <br>
                    dengan memantau keaktifan anak!!”
                </p>
                <img src="{{ asset('images/kids.png') }}" alt="Ilustrasi Anak" class="mt-6 w-48">
            </div>
        </div>
    </div>
</body>
</html>