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
    <title>Lengkapi Data Siswa - Data Sbanda</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
</head>
<body class="min-h-screen bg-gradient-animated relative">
    
    {{-- Decorative Background Elements --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="orb orb-cyan w-96 h-96 -top-48 -left-48 opacity-20"></div>
        <div class="orb orb-blue w-80 h-80 top-1/3 -right-40 opacity-15"></div>
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto px-4 py-8 relative z-10">
        {{-- Header Section --}}
        <div class="glass rounded-3xl p-8 mb-8 animate-fade-in">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                <div>
                    <h1 class="text-white text-3xl lg:text-4xl font-bold mb-3 text-glow-white flex items-center gap-4">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3ZM18.82 9L12 12.72L5.18 9L12 5.28L18.82 9ZM17 15.99L12 18.72L7 15.99V12.27L12 15L17 12.27V15.99Z"/>
                            </svg>
                        </div>
                        Pencatatan Data Siswa
                    </h1>
                    <p class="text-white/80 text-lg ml-18">Mohon lengkapi data berikut untuk pencatatan sekolah</p>
                </div>
                
                {{-- Progress Indicator --}}
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center font-bold text-blue-600 shadow-lg">1</div>
                        <span class="text-white font-medium">Data Siswa</span>
                    </div>
                    <div class="w-12 h-1 bg-white/30 rounded-full"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-white/30 rounded-xl flex items-center justify-center font-bold text-white/70">2</div>
                        <span class="text-white/50 font-medium">Data Wali</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="card-futuristic p-8 lg:p-10 animate-slide-up" style="animation-delay: 0.1s">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Data Siswa</h2>
                    <p class="text-gray-500 text-sm">Isi informasi pribadi siswa</p>
                </div>
            </div>

            <form action="" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- Nama Lengkap --}}
                    <div class="animate-fade-in" style="animation-delay: 0.15s">
                        <label for="nama_lengkap" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nama_lengkap" 
                            name="nama_lengkap" 
                            placeholder="Masukkan nama lengkap siswa"
                            class="input-futuristic w-full"
                            required
                        >
                    </div>

                    {{-- NIK --}}
                    <div class="animate-fade-in" style="animation-delay: 0.2s">
                        <label for="nik" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                </svg>
                            </div>
                            NIK <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nik" 
                            name="nik" 
                            placeholder="Masukkan NIK siswa (16 digit)"
                            maxlength="16"
                            minlength="16"
                            class="input-futuristic w-full"
                            required
                        >
                    </div>

                    {{-- Tempat, Tanggal Lahir --}}
                    <div class="animate-fade-in" style="animation-delay: 0.25s">
                        <label for="tempat_tanggal_lahir" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            Tempat, Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="tempat_tanggal_lahir" 
                            name="tempat_tanggal_lahir" 
                            placeholder="cth: Semarang, 4 Agustus 2009"
                            class="input-futuristic w-full"
                            required
                        >
                    </div>

                    {{-- Alamat Rumah --}}
                    <div class="animate-fade-in" style="animation-delay: 0.3s">
                        <label for="alamat" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            Alamat Rumah <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="alamat" 
                            name="alamat" 
                            placeholder="Cantumkan nama jalan & nomor rumah"
                            class="input-futuristic w-full"
                            required
                        >
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="animate-fade-in" style="animation-delay: 0.35s">
                        <label for="jenis_kelamin" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                </svg>
                            </div>
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select 
                                id="jenis_kelamin" 
                                name="jenis_kelamin"
                                class="input-futuristic w-full appearance-none cursor-pointer pr-12"
                                required>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Agama --}}
                    <div class="animate-fade-in" style="animation-delay: 0.4s">
                        <label for="agama" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            Agama <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select 
                                id="agama" 
                                name="agama"
                                class="input-futuristic w-full appearance-none cursor-pointer pr-12"
                                required>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Kelas --}}
                    <div class="animate-fade-in" style="animation-delay: 0.45s">
                        <label for="kelas" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            Kelas <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select 
                                id="kelas" 
                                name="kelas"
                                class="input-futuristic w-full appearance-none cursor-pointer pr-12"
                                required>
                                <option value="6">Kelas 6</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-end mt-10 animate-fade-in" style="animation-delay: 0.5s">
                    <button 
                        type="submit"
                        class="btn-futuristic py-4 px-10 text-lg flex items-center gap-3"
                    >
                        <span>Selanjutnya</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
