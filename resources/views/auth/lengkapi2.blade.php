<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Lengkapi Data Orang Tua - Data Sbanda</title>
    <style>
      body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gradient-animated relative">
    
    {{-- Decorative Background Elements --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="orb orb-cyan w-96 h-96 -top-48 -right-48 opacity-20"></div>
        <div class="orb orb-blue w-80 h-80 bottom-1/3 -left-40 opacity-15"></div>
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto px-4 py-8 relative z-10">
        {{-- Header Section --}}
        <div class="glass rounded-3xl p-8 mb-8 animate-fade-in">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                <div>
                    <h1 class="text-white text-3xl lg:text-4xl font-bold mb-3 text-glow-white flex items-center gap-4">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        Pencatatan Data Orang Tua
                    </h1>
                    <p class="text-white/80 text-lg ml-18">Mohon lengkapi data berikut untuk pencatatan sekolah</p>
                </div>
                
                {{-- Progress Indicator --}}
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-emerald-400 rounded-xl flex items-center justify-center font-bold text-white shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-white/70 font-medium">Data Siswa</span>
                    </div>
                    <div class="w-12 h-1 bg-white/50 rounded-full"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center font-bold text-blue-600 shadow-lg">2</div>
                        <span class="text-white font-medium">Data Wali</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="card-futuristic p-8 lg:p-10 animate-slide-up" style="animation-delay: 0.1s">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Data Orang Tua / Wali</h2>
                    <p class="text-gray-500 text-sm">Isi informasi wali murid</p>
                </div>
            </div>

            <form action="" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- Nama Lengkap Wali --}}
                    <div class="animate-fade-in" style="animation-delay: 0.15s">
                        <label for="nama_wali" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nama_wali" 
                            name="nama_wali" 
                            placeholder="Masukkan nama lengkap wali"
                            class="input-futuristic w-full"
                            required
                        >
                    </div>

                    {{-- NIK Wali --}}
                    <div class="animate-fade-in" style="animation-delay: 0.2s">
                        <label for="nik_wali" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                </svg>
                            </div>
                            NIK Wali Murid <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nik_wali" 
                            name="nik_wali" 
                            placeholder="Masukkan NIK orang tua (16 digit)"
                            maxlength="16"
                            minlength="16"
                            class="input-futuristic w-full"
                            required
                        >
                    </div>

                    {{-- Alamat Wali --}}
                    <div class="animate-fade-in" style="animation-delay: 0.25s">
                        <label for="alamat_wali" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
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
                            id="alamat_wali" 
                            name="alamat_wali" 
                            placeholder="Jalan/RT/RW/Kelurahan"
                            class="input-futuristic w-full"
                            required
                        >
                    </div>

                    {{-- Nomor Telepon --}}
                    <div class="animate-fade-in" style="animation-delay: 0.3s">
                        <label for="nomor_telepon_wali" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            Nomor Telepon <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nomor_telepon_wali" 
                            name="nomor_telepon_wali" 
                            placeholder="cth: 0858-5449-8289"
                            class="input-futuristic w-full"
                            required
                        >
                    </div>
                </div>

                {{-- Row of 3 selects --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    {{-- Agama Wali --}}
                    <div class="animate-fade-in" style="animation-delay: 0.35s">
                        <label for="agama_wali" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            Agama <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select 
                                id="agama_wali" 
                                name="agama_wali"
                                class="input-futuristic w-full appearance-none cursor-pointer pr-12"
                                required>
                                <option value="Islam">☪️ Islam</option>
                                <option value="Kristen">✝️ Kristen</option>
                                <option value="Katolik">⛪ Katolik</option>
                                <option value="Hindu">🕉️ Hindu</option>
                                <option value="Buddha">☸️ Buddha</option>
                                <option value="Konghucu">☯️ Konghucu</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Pekerjaan Wali --}}
                    <div class="animate-fade-in" style="animation-delay: 0.4s">
                        <label for="pekerjaan_wali" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            Pekerjaan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select 
                                id="pekerjaan_wali" 
                                name="pekerjaan_wali"
                                class="input-futuristic w-full appearance-none cursor-pointer pr-12"
                                required>
                                <option value="Pegawai Negri">🏛️ Pegawai Negri</option>
                                <option value="Pegawai Swasta">🏢 Pegawai Swasta</option>
                                <option value="Kehutanan">🌲 Kehutanan</option>
                                <option value="Kesehatan">🏥 Kesehatan</option>
                                <option value="Keamanan">🛡️ Keamanan</option>
                                <option value="Mengurus Rumah Tangga">🏠 Ibu Rumah Tangga</option>
                                <option value="Yang Lainnya">📋 Lainnya</option>
                                <option value="Tidak Bekerja">❌ Tidak Bekerja</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Peran Wali --}}
                    <div class="animate-fade-in" style="animation-delay: 0.45s">
                        <label for="peran_wali" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                            <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                </svg>
                            </div>
                            Peran Wali <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select 
                                id="peran_wali" 
                                name="peran_wali"
                                class="input-futuristic w-full appearance-none cursor-pointer pr-12"
                                required>
                                <option value="Ayah">👨 Ayah</option>
                                <option value="Ibu">👩 Ibu</option>
                                <option value="Kakak_yatim">👤 Kakak (bila yatim)</option>
                                <option value="Paman_Bibi_yatim">👥 Paman/Bibi (bila yatim)</option>
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
                        <span>Selesai</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>