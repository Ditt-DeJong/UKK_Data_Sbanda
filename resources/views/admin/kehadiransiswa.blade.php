<x-mainLayout 
    title="Kehadiran Siswa" 
    :active="'kehadiran'"
    pageTitle="Kehadiran Siswa"
    pageSubtitle="Kelola absensi dan rekap kehadiran siswa"
    :notifCount="$notifCount">

<!-- Notification Modal Component -->
<x-notifModal :dataSiswaPending="$dataSiswaPending" />

<!-- STATISTIK CARDS -->
<section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Hadir -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.1s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-check-circle text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Hadir</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-emerald-500">{{ $countHadir }}</h3>
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
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">{{ $countIzin }}</h3>
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
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-rose-500">{{ $countSakit }}</h3>
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
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-gray-600 to-slate-500">{{ $countAlpha }}</h3>
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
                        Daftar Kehadiran
                    </h3>
                    <p class="text-sm text-gray-500 ml-4">{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>

            <!-- Filter Section (Server-side via GET) -->
            <form method="GET" action="{{ route('admin.kehadiransiswa') }}" id="filterForm">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2 block">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ $tanggal }}" class="input-futuristic w-full" onchange="document.getElementById('filterForm').submit();">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2 block">Status</label>
                        <div class="relative">
                            <select name="status" class="input-futuristic w-full appearance-none pr-12" onchange="document.getElementById('filterForm').submit();">
                                <option value="" {{ $status == '' ? 'selected' : '' }}>Semua Status</option>
                                <option value="hadir" {{ $status == 'hadir' ? 'selected' : '' }}>✅ Hadir</option>
                                <option value="izin" {{ $status == 'izin' ? 'selected' : '' }}>📋 Izin</option>
                                <option value="sakit" {{ $status == 'sakit' ? 'selected' : '' }}>🏥 Sakit</option>
                                <option value="alpha" {{ $status == 'alpha' ? 'selected' : '' }}>❌ Alpha</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2 block">Cari Siswa</label>
                        <div class="relative">
                            <input type="text" name="search" value="{{ $search }}" placeholder="Nama atau NIS..." class="input-futuristic w-full pl-12">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-end gap-2">
                        <button type="submit" class="btn-futuristic py-3 px-6 flex items-center gap-2">
                            <i class="fa-solid fa-filter"></i> Filter
                        </button>
                        <a href="{{ route('admin.kehadiransiswa') }}" class="px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-xl font-medium transition-all duration-200 flex items-center gap-2">
                            <i class="fa-solid fa-rotate-left"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
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
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($kehadiran as $index => $row)
                    <tr class="hover:bg-blue-50/50 transition-colors duration-200 group">
                        <td class="px-6 py-4 font-medium text-gray-600">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded">{{ $row->siswa->nik_siswa ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center font-bold text-white shadow-md group-hover:scale-105 transition-transform">
                                    {{ strtoupper(substr($row->siswa->nama_siswa ?? 'U', 0, 1)) }}
                                </div>
                                <span class="font-semibold text-gray-800">{{ $row->siswa->nama_siswa ?? 'Siswa Tidak Ditemukan' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">
                                {{ $row->siswa->kelas ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($row->created_at)
                            <span class="text-gray-700 font-medium">{{ \Carbon\Carbon::parse($row->created_at)->format('H:i') }} WIB</span>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if(strtolower($row->status) == 'hadir')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span> Hadir
                            </span>
                            @elseif(strtolower($row->status) == 'izin')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                <span class="w-2 h-2 bg-amber-500 rounded-full"></span> Izin
                            </span>
                            @elseif(strtolower($row->status) == 'sakit')
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
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                            <i class="fa-solid fa-calendar-xmark text-4xl mb-3 block opacity-50"></i>
                            <p class="font-medium">Tidak ada data kehadiran untuk tanggal ini</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Info -->
        <div class="p-6 border-t border-gray-200/60 bg-gray-50/50">
            <p class="text-sm text-gray-600">Menampilkan {{ $kehadiran->count() }} data kehadiran dari {{ $totalSiswa }} siswa terdaftar</p>
        </div>

    </div>
</section>

</x-mainLayout>