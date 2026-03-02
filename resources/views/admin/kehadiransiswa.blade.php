<x-mainLayout 
    title="Kehadiran Siswa" 
    :active="'kehadiran'"
    pageTitle="Kehadiran Siswa"
    pageSubtitle="Kelola absensi dan rekap kehadiran siswa"
    :notifCount="3">

<!-- Notification Modal Component -->
<x-notifModal />
<x-ijinModal />
<x-siswa-modal />
<x-kehadiran-modal />

<!-- STATISTIK CARDS -->
<section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Total Siswa -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.1s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-users text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Siswa</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-500">36</h3>
            </div>
        </div>
    </div>

    <!-- Izin -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.15s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-file-lines text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Izin</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">4</h3>
            </div>
        </div>
    </div>

    <!-- Sakit -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.2s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg shadow-red-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-notes-medical text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Sakit</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-rose-500">2</h3>
            </div>
        </div>
    </div>

    <!-- Alpha -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.25s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-gray-500 to-slate-600 rounded-2xl flex items-center justify-center shadow-lg shadow-gray-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-circle-xmark text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Alpha</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-gray-600 to-slate-500">0</h3>
            </div>
        </div>
    </div>
</section>

<!-- FILTER & TABLE SECTION -->
<section class="px-6 pb-10">
    <div class="card-futuristic overflow-hidden animate-slide-up" style="animation-delay: 0.3s">

        <!-- Header dengan Filter -->
        <div class="p-6 border-b border-gray-200/60">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <div class="w-2 h-6 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
                        Daftar Kehadiran Hari Ini
                    </h3>
                    <p class="text-sm text-gray-500 ml-4">Senin, 24 November 2025</p>
                </div>
                
                <!-- Tombol Export & Rekap -->
                <div class="flex gap-3">
                    <button onclick="openRekapKehadiran()" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/30 flex items-center gap-2">
                        <i class="fa-solid fa-chart-pie"></i> Rekap
                    </button>
                    <button onclick="exportKehadiran()" class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-300 hover:shadow-lg hover:shadow-emerald-500/30 flex items-center gap-2">
                        <i class="fa-solid fa-file-excel"></i> Export
                    </button>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="text-sm font-semibold text-gray-700 mb-2 block">Tanggal</label>
                    <input type="date" value="2025-11-24" class="input-futuristic w-full">
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-700 mb-2 block">Status</label>
                    <div class="relative">
                        <select class="input-futuristic w-full appearance-none pr-12">
                            <option value="">Semua Status</option>
                            <option value="izin">📋 Izin</option>
                            <option value="sakit">🏥 Sakit</option>
                            <option value="alpha">❌ Alpha</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-700 mb-2 block">Cari Siswa</label>
                    <div class="relative">
                        <input type="text" id="searchKehadiran" placeholder="Nama atau NIS..." class="input-futuristic w-full pl-12">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fa-solid fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Kehadiran -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100/80">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">NIS</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nama Siswa</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Waktu Absen</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Keterangan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($kehadiran as $index => $row)
                    <tr class="hover:bg-blue-50/50 transition-colors duration-200 group">
                        <td class="px-6 py-4 font-medium text-gray-600">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded">{{ $row->siswa->nis }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center font-bold text-white shadow-md group-hover:scale-105 transition-transform">
                                    {{ strtoupper(substr($row->siswa->nama, 0, 1)) }}
                                </div>
                                <span class="font-semibold text-gray-800">{{ $row->siswa->nama }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">
                                {{ $row->siswa->kelas }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($row->waktu_absen)
                            <span class="text-gray-700 font-medium">{{ date('H:i', strtotime($row->waktu_absen)) }} WIB</span>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($row->status == 'hadir')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span> Hadir
                            </span>
                            @elseif($row->status == 'izin')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                <span class="w-2 h-2 bg-amber-500 rounded-full"></span> Izin
                            </span>
                            @elseif($row->status == 'sakit')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span> Sakit
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-gray-200 text-gray-600">
                                <span class="w-2 h-2 bg-gray-400 rounded-full"></span> Alpha
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-600 max-w-xs truncate">{{ $row->keterangan ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <button onclick="openDetailKehadiran({{ json_encode($row) }})" 
                                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-gray-200/60 flex items-center justify-between bg-gray-50/50">
            <p class="text-sm text-gray-600">Menampilkan 1-5 dari 36 siswa</p>
            
            <div class="flex items-center gap-2">
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-xl hover:bg-gray-100 transition text-gray-600">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="w-10 h-10 flex items-center justify-center bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl font-semibold shadow-lg shadow-blue-500/30">1</button>
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-xl hover:bg-gray-100 transition text-gray-600">2</button>
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-xl hover:bg-gray-100 transition text-gray-600">3</button>
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-xl hover:bg-gray-100 transition text-gray-600">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>

    </div>
</section>

</x-mainLayout>

@push('scripts')
<script>
    function openDetailKehadiran(data) {
        console.log('Detail kehadiran:', data);
    }

    function openRekapKehadiran() {
        alert('Fitur rekap kehadiran akan segera hadir!');
    }

    function exportKehadiran() {
        alert('Data kehadiran akan di-export ke Excel!');
    }

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