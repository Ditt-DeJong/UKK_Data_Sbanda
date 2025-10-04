@vite('resources/css/app.css')
@vite('resources/js/app.js')

<body class="flex flex-col min-h-screen bg-gray-100">
    <div class="container">
        <div class="w-full py-8 px-8 bg-blue-600">
            <!-- Card Container -->
                <!-- Header Section -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-white text-3xl lg:text-4xl font-bold mb-4">Pencatatan Data Orang Tua</h1>
                        <p class="text-white text-opacity-90 text-lg">Mohon lengkapi data berikut untuk pencatatan sekolah</p>
                    </div>
                    <div class="">
                        <svg class="w-24 h-24 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3ZM18.82 9L12 12.72L5.18 9L12 5.28L18.82 9ZM17 15.99L12 18.72L7 15.99V12.27L12 15L17 12.27V15.99Z"/>
                        </svg>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="bg-blue-400 bg-opacity-40 backdrop-blur-sm rounded-2xl p-6 lg:p-8">
                    <h2 class="text-white text-3xl font-semibold mb-6">Data Orang Tua</h2>

                    <form action="" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Nama Lengkap -->
                            <div>
                                <label for="nama_lengkap" class="block text-white font-medium mb-2">
                                    Nama Lengkap <span class="text-orange-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="nama_lengkap" 
                                    name="nama_lengkap" 
                                    placeholder="Masukkan nama lengkap siswa"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200"
                                    required
                                >
                            </div>

                            <!-- NIK -->
                            <div>
                                <label for="nik_wali" class="block text-white font-medium mb-2">
                                    NIK Wali Murid <span class="text-orange-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="nik_wali" 
                                    name="nik_wali" 
                                    placeholder="Masukkan NIK orang tua (16 digit)"
                                    maxlength="16"
                                    minlength="16"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200"
                                    required
                                >
                            </div>

                            <!-- Alamat Rumah -->
                            <div>
                                <label for="alamat_wali" class="block text-white font-medium mb-2">
                                    Alamat Rumah <span class="text-orange-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="alamat_wali" 
                                    name="alamat_wali" 
                                    placeholder="Jalan/RT/RW/Kelurahan"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200"
                                    required
                                >
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="flex flex-col w-full relative">
                                <label for="nomor_telepon_wali" class="block text-white font-medium mb-2">
                                    Nomor Telepon Wali <span class="text-orange-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="nomor_telepon_wali" 
                                    name="nomor_telepon_walii" 
                                    placeholder="cth: 0858-5449-8289"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200"
                                    required
                                >
                            </div>
                        </div>
                        <!-- TIGA FORM TERAKHIR DALAM SATU BARIS -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                            <!-- Agama Wali -->
                            <div class="flex flex-col relative">
                                <label for="agama_wali" class="block text-white font-medium mb-2">
                                    Agama <span class="text-orange-500">*</span>
                                </label>
                                <select 
                                    id="agama_wali" 
                                    name="agama_wali"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200 appearance-none cursor-pointer"
                                    required>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-3 top-9 flex items-center text-gray-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Pekerjaan Wali -->
                            <div class="flex flex-col relative">
                                <label for="pekerjaan_wali" class="block text-white font-medium mb-2">
                                    Pekerjaan Wali <span class="text-orange-500">*</span>
                                </label>
                                <select 
                                    id="pekerjaan_wali" 
                                    name="pekerjaan_wali"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200 appearance-none cursor-pointer"
                                    required>
                                    <option value="pns">Pegawai Negri</option>
                                    <option value="wiraswasta">Pegawai Swasta</option>
                                    <option value="kehutanan">Kehutanan</option>
                                    <option value="kesehatan">Kesehatan</option>
                                    <option value="keamanan">Keamanan</option>
                                    <option value="rumah_tangga">Mengurus Rumah Tangga (Ibu)</option>
                                    <option value="lain">Yang Lainnya</option>
                                    <option value="tidak_kerja">Tidak Berkerja</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-3 top-9 flex items-center text-gray-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Peran Wali -->
                            <div class="flex flex-col relative">
                                <label for="peran_wali" class="block text-white font-medium mb-2">
                                    Peran Wali <span class="text-orange-500">*</span>
                                </label>
                                <select 
                                    id="peran_wali" 
                                    name="peran_wali"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200 appearance-none cursor-pointer"
                                    required>
                                    <option value="ayah">Ayah</option>
                                    <option value="ibu">Ibu</option>
                                    <option value="kakak">Kakak (bila yatim)</option>
                                    <option value="paman_bibi">Paman atau Bibi (bila yatim)</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-3 top-9 flex items-center text-gray-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>


                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8">
                            <button 
                                type="submit"
                                class="bg-gradient-to-r text-white from-blue-500 to-blue-700  hover:bg-gradient-to-r hover:from-blue-100 hover:to-blue-300 hover:text-blue-600 font-semibold px-8 py-3 !rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2"
                            >Selanjutnya
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>