<x-mainLayout 
    title="Kehadiran Siswa" 
    :active="'kehadiran'"
    pageTitle="Kehadiran Siswa"
    pageSubtitle="Kelola absensi dan rekap kehadiran siswa"
    :notifCount="3">

    <!-- Notification Modal Component -->
<x-notifModal />

<!-- Detail Izin Modal Component -->
<x-ijinModal />

<!-- Detail Data Siswa Component -->
<x-siswa-modal />

<!-- Detail Data Kehadiran Component -->
<x-kehadiran-modal />

    <!-- STATISTIK CARDS -->
    <section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-2">
                <div class="bg-blue-200 p-3 rounded-lg">
                    <i class="fa-solid fa-users text-blue-600 text-xl"></i>
                </div>
            </div>
            <p class="text-sm font-medium text-blue-700 mb-1">Total Siswa</p>
            <h3 class="text-3xl font-bold text-blue-600">36</h3>
        </div>

        <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 border-l-4 border-yellow-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-2">
                <div class="bg-yellow-200 p-3 rounded-lg">
                    <i class="fa-solid fa-file-lines text-yellow-600 text-xl"></i>
                </div>
            </div>
            <p class="text-sm font-medium text-yellow-700 mb-1">Izin</p>
            <h3 class="text-3xl font-bold text-yellow-600">4</h3>
        </div>

        <div class="bg-gradient-to-br from-red-50 to-red-100 border-l-4 border-red-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-2">
                <div class="bg-red-200 p-3 rounded-lg">
                    <i class="fa-solid fa-notes-medical text-red-600 text-xl"></i>
                </div>
            </div>
            <p class="text-sm font-medium text-red-700 mb-1">Sakit</p>
            <h3 class="text-3xl font-bold text-red-600">2</h3>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-gray-100 border-l-4 border-gray-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-2">
                <div class="bg-gray-200 p-3 rounded-lg">
                    <i class="fa-solid fa-circle-xmark text-gray-600 text-xl"></i>
                </div>
            </div>
            <p class="text-sm font-medium text-gray-700 mb-1">Alpha</p>
            <h3 class="text-3xl font-bold text-gray-600">0</h3>
        </div>

    </section>

    <!-- FILTER & TABLE SECTION -->
    <section class="px-6 pb-10">

        <div class="bg-white border border-gray-300 rounded-xl shadow-sm">

            <!-- Header dengan Filter -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Daftar Kehadiran Hari Ini</h3>
                        <p class="text-sm text-gray-500">Senin, 24 November 2025</p>
                    </div>
                    
                    <!-- Tombol Export & Rekap -->
                    <div class="flex gap-2">
                        <button onclick="openRekapKehadiran()" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-semibold text-sm transition flex items-center gap-2">
                            <i class="fa-solid fa-chart-pie"></i> Rekap Kehadiran
                        </button>
                        <button onclick="exportKehadiran()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold text-sm transition flex items-center gap-2">
                            <i class="fa-solid fa-file-excel"></i> Export Excel
                        </button>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Tanggal -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">Tanggal</label>
                        <input 
                            type="date" 
                            value="2025-11-24"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                    </div>

                    <!-- Status Kehadiran -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">Status Kehadiran</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            <option value="">Semua Status</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option value="alpha">Alpha</option>
                        </select>
                    </div>

                    <!-- Search -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">Cari Siswa</label>
                        <div class="relative">
                            <input 
                                type="text" 
                                id="searchKehadiran"
                                placeholder="Nama atau NIS..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            <i class="fa-solid fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Kehadiran -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">NIS</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama Siswa</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kelas</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Waktu Absen</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Keterangan</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        
                        <!-- Row 1 - Hadir -->
                        @foreach ($kehadiran as $index => $row)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $row->siswa->nis }}</td>
                                <td class="px-6 py-4">{{ $row->siswa->nama }}</td>
                                <td class="px-6 py-4">{{ $row->siswa->kelas }}</td>
                                <td class="px-6 py-4">
                                    {{ $row->waktu_absen ? date('H:i', strtotime($row->waktu_absen)) . ' WIB' : '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    @include('admin.kehadiran.status-badge', ['status' => $row->status])
                                </td>
                                <td class="px-6 py-4">{{ $row->keterangan }}</td>
                                <td class="px-6 py-4">
                                    <button onclick="openDetailKehadiran({{ json_encode($row) }})"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-6 border-t border-gray-200 flex items-center justify-between">
                <p class="text-sm text-gray-600">Menampilkan 1-5 dari 36 siswa</p>
                
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
    // Open Detail Kehadiran Modal
    function openDetailKehadiran(data) {
        console.log('Detail kehadiran:', data);
        // Akan menggunakan modal component
    }

    // Open Rekap Kehadiran
    function openRekapKehadiran() {
        alert('Fitur rekap kehadiran akan segera hadir!');
    }

    // Export to Excel
    function exportKehadiran() {
        alert('Data kehadiran akan di-export ke Excel!');
    }

    // Search functionality
    document.getElementById('searchKehadiran')?.addEventListener('input', function(e) {
        const searchValue = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endpush