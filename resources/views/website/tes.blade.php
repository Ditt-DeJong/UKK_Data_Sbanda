@vite('resources/css/app.css')
@vite('resources/js/app.js')

<body class="flex flex-col min-h-screen bg-gray-100">
    <div class="container">
        <div class="w-full py-8 px-8 bg-blue-600">
            <!-- Card Container -->
                <!-- Header Section -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-white text-3xl lg:text-4xl font-bold mb-4">Pencatatan Data Siswa</h1>
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
                    <h2 class="text-white text-3xl font-semibold mb-6">Data Siswa</h2>

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
                                <label for="nik" class="block text-white font-medium mb-2">
                                    NIK <span class="text-orange-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="nik" 
                                    name="nik" 
                                    placeholder="Masukkan NIK siswa (16 digit)"
                                    maxlength="16"
                                    minlength="16"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200"
                                    required
                                >
                            </div>

                            <!-- Tempat, Tanggal Lahir -->
                            <div>
                                <label for="tempat_tanggal_lahir" class="block text-white font-medium mb-2">
                                    Tempat, Tanggal Lahir <span class="text-orange-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="tempat_tanggal_lahir" 
                                    name="tempat_tanggal_lahir" 
                                    placeholder="cth: Semarang, 4 Agustus 2009"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200"
                                    required
                                >
                            </div>

                            <!-- Alamat Rumah -->
                            <div>
                                <label for="alamat" class="block text-white font-medium mb-2">
                                    Alamat Rumah <span class="text-orange-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="alamat" 
                                    name="alamat" 
                                    placeholder="Cantumkan nama jalan & nomor rumah"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200"
                                    required
                                >
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label for="jenis_kelamin" class="block text-white font-medium mb-2">
                                    Jenis Kelamin <span class="text-orange-500">*</span>
                                </label>
                                <select 
                                    id="jenis_kelamin" 
                                    name="jenis_kelamin"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200 appearance-none cursor-pointer"
                                    required
                                >
                                    <option value="">Laki-laki</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <!-- Agama -->
                            <div>
                                <label for="agama" class="block text-white font-medium mb-2">
                                    Agama <span class="text-orange-500">*</span>
                                </label>
                                <select 
                                    id="agama" 
                                    name="agama"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200 appearance-none cursor-pointer"
                                    required
                                >
                                    <option value="">Islam</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                            </div>

                            <!-- Kelas -->
                            <div class="flex flex-col w-full">
                                <label for="kelas" class="block text-white font-medium mb-2">
                                    Kelas <span class="text-orange-500">*</span>
                                </label>
                                <select 
                                    id="kelas" 
                                    name="kelas"
                                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-90 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200 appearance-none cursor-pointer"
                                    required
                                >
                                    <option value="">6</option>
                                    <option value="">Hanya untuk kelas 6</option>
                                </select>
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