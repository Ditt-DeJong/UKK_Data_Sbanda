<x-mainLayout 
    title="Data Siswa" 
    :active="'data-siswa'"
    pageTitle="Data Siswa"
    pageSubtitle="Kelola data siswa dan informasi akademik"
    :notifCount="3">


<!-- Notification Modal Component -->
<x-notifModal :dataSiswaPending="$dataSiswaPending" />

<!-- Detail Izin Modal Component -->
<x-ijinModal />

<!-- Detail Data Siswa Component -->
<x-siswa-modal />

<!-- Detail Data Kehadiran Component -->
<x-kehadiran-modal />

    <!-- STATISTIK CARDS -->
    <section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center gap-4">
                <div class="bg-blue-200 p-3 rounded-lg">
                    <i class="fa-solid fa-users text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <p class="text-lg font-medium text-blue-700">Total Siswa</p>
                    <h3 class="text-3xl font-bold text-blue-600">36</h3>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 border-l-4 border-green-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center gap-4">
                <div class="bg-green-200 p-3 rounded-lg">
                    <i class="fa-solid fa-user-check text-green-600 text-2xl"></i>
                </div>
                <div>
                    <p class="text-lg font-medium text-green-700">Siswa Aktif</p>
                    <h3 class="text-3xl font-bold text-green-600">30</h3>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 border-l-4 border-yellow-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center gap-4">
                <div class="bg-yellow-200 p-3 rounded-lg">
                    <i class="fa-solid fa-user-clock text-yellow-600 text-2xl"></i>
                </div>
                <div>
                    <p class="text-lg font-medium text-yellow-700">Siswa Pending</p>
                    <h3 class="text-3xl font-bold text-yellow-600">6</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- FILTER & TABLE SECTION -->
    <section class="px-6 pb-10">

        <div class="bg-white border border-gray-300 rounded-xl shadow-sm">

            <!-- Header dengan Filter & Search -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Daftar Siswa</h3>
                        <p class="text-sm text-gray-500">Kelola data siswa dan informasi akademik</p>
                    </div>
                    
                    <!-- Tombol Tambah Siswa -->
                    <button onclick="openTambahSiswaModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold text-sm transition flex items-center gap-2">
                        <i class="fa-solid fa-plus"></i> Tambah Siswa Baru
                    </button>
                </div>

                <!-- Search & Filter -->
                <div class="flex flex-col lg:flex-row gap-4">
                    <!-- Search Box -->
                    <div class="flex-1">
                        <div class="relative">
                            <input 
                                type="text" 
                                id="searchInput"
                                placeholder="Cari nama siswa, NIS, atau nama orang tua..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            <i class="fa-solid fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Filter Status -->
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="cuti">Pending</option>
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">NIS</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama Siswa</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kelas</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Orang Tua</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No. Telepon</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        
                        <!-- Row 1 -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-600">2301</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold">
                                        A
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Ahmad Fauzi</p>
                                        <p class="text-xs text-gray-500">L • 15 tahun</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">6</td>
                            <td class="px-6 py-4 text-gray-600">Bapak Fauzi</td>
                            <td class="px-6 py-4 text-gray-600">0812-3456-7890</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Aktif</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button onclick="openDetailSiswaModal({
                                        nis: '2301',
                                        nama: 'Ahmad Fauzi',
                                        kelas: '6',
                                        jenisKelamin: 'Laki-laki',
                                        tanggalLahir: '15 Januari 2010',
                                        alamat: 'Jl. Merdeka No. 123, Semarang',
                                        namaOrtu: 'Bapak Fauzi',
                                        noTelp: '0812-3456-7890',
                                        pekerjaan: 'Keamanan',
                                        status: 'Aktif'
                                    })" class="text-blue-600 hover:text-blue-800 transition">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button onclick="openEditSiswaModal()" class="text-green-600 hover:text-green-800 transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button onclick="confirmDelete('Ahmad Fauzi')" class="text-red-600 hover:text-red-800 transition">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-600">2302</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-semibold">
                                        S
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Siti Nurhaliza</p>
                                        <p class="text-xs text-gray-500">P • 16 tahun</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">6</td>
                            <td class="px-6 py-4 text-gray-600">Ibu Haliza</td>
                            <td class="px-6 py-4 text-gray-600">0813-9876-5432</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Aktif</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button onclick="openDetailSiswaModal({
                                        nis: '2302',
                                        nama: 'Siti Nurhaliza',
                                        kelas: '6',
                                        jenisKelamin: 'Perempuan',
                                        tanggalLahir: '22 Maret 2009',
                                        alamat: 'Jl. Pahlawan No. 45, Semarang',
                                        namaOrtu: 'Ibu Haliza',
                                        noTelp: '0813-9876-5432',
                                        pekerjaan: 'Pegawai negeri',
                                        status: 'Aktif'
                                    })" class="text-blue-600 hover:text-blue-800 transition">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button onclick="openEditSiswaModal()" class="text-green-600 hover:text-green-800 transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button onclick="confirmDelete('Siti Nurhaliza')" class="text-red-600 hover:text-red-800 transition">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-600">2303</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-semibold">
                                        B
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Budi Santoso</p>
                                        <p class="text-xs text-gray-500">L • 17 tahun</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">6</td>
                            <td class="px-6 py-4 text-gray-600">Ibu Santi</td>
                            <td class="px-6 py-4 text-gray-600">0815-1234-5678</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">Cuti</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button onclick="openDetailSiswaModal({
                                        nis: '2303',
                                        nama: 'Budi Santoso',
                                        kelas: '6',
                                        jenisKelamin: 'Laki-laki',
                                        tanggalLahir: '10 Juli 2008',
                                        alamat: 'Jl. Diponegoro No. 78, Semarang',
                                        namaOrtu: 'Ibu Santi',
                                        noTelp: '0815-1234-5678',
                                        pekerjaan: 'Keamanan',
                                        status: 'Cuti'
                                    })" class="text-blue-600 hover:text-blue-800 transition">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button onclick="openEditSiswaModal()" class="text-green-600 hover:text-green-800 transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button onclick="confirmDelete('Budi Santoso')" class="text-red-600 hover:text-red-800 transition">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-600">2304</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-semibold">
                                        D
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Dewi Lestari</p>
                                        <p class="text-xs text-gray-500">P • 15 tahun</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">6</td>
                            <td class="px-6 py-4 text-gray-600">Bapak Lesmana</td>
                            <td class="px-6 py-4 text-gray-600">0816-5555-4444</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Aktif</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button onclick="openDetailSiswaModal({
                                        nis: '2304',
                                        nama: 'Dewi Lestari',
                                        kelas: '6',
                                        jenisKelamin: 'Perempuan',
                                        tanggalLahir: '5 September 2010',
                                        alamat: 'Jl. Pemuda No. 90, Semarang',
                                        namaOrtu: 'Bapak Lesmana',
                                        noTelp: '0816-5555-4444',
                                        pekerjaan: 'Pegawai negeri',
                                        status: 'Aktif'
                                    })" class="text-blue-600 hover:text-blue-800 transition">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button onclick="openEditSiswaModal()" class="text-green-600 hover:text-green-800 transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button onclick="confirmDelete('Dewi Lestari')" class="text-red-600 hover:text-red-800 transition">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-6 border-t border-gray-200 flex items-center justify-between">
                <p class="text-sm text-gray-600">Menampilkan 1-4 dari 36 siswa</p>
                
                <div class="flex items-center gap-2">
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="px-3 py-2 bg-blue-600 text-white rounded-lg font-semibold text-sm">1</button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">2</button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">3</button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>

        </div>

    </section>

</x-mainLayout>

@push('scripts')
<script>
    // Detail Siswa Modal
    function openDetailSiswaModal(data) {
        // Implementasi akan ditambahkan di component modal
        console.log('Open detail siswa:', data);
        // Nanti akan memanggil modal component
    }

    // Edit Siswa Modal
    function openEditSiswaModal() {
        alert('Fitur edit siswa akan segera hadir!');
    }

    // Tambah Siswa Modal
    function openTambahSiswaModal() {
        alert('Fitur tambah siswa akan segera hadir!');
    }

    // Confirm Delete
    function confirmDelete(nama) {
        if (confirm(`Apakah Anda yakin ingin menghapus data siswa "${nama}"?\n\nTindakan ini tidak dapat dibatalkan!`)) {
            alert(`Data siswa ${nama} berhasil dihapus!`);
            // Implementasi AJAX delete di sini
        }
    }

    // Search functionality
    document.getElementById('searchInput')?.addEventListener('input', function(e) {
        const searchValue = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endpush