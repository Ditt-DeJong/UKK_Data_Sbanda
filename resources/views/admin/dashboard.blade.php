<x-mainLayout 
    title="Dashboard" 
    :active="'dashboard'"
    pageTitle="Dashboard"
    pageSubtitle="Kelola sistem absensi dan pendataan siswa"
    :notifCount="$notifCount">

<!-- Notification Modal -->
<x-notifModal :dataSiswaPending="$dataSiswaPending" />

<!-- STATISTIK -->
<section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Total Siswa -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.1s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-users text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Siswa Terdaftar</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-500">{{ $totalSiswa }}</h3>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2 text-sm">
            <span class="flex items-center gap-1 text-amber-600 bg-amber-100 px-2 py-0.5 rounded-full">
                <i class="fa-solid fa-clock text-xs"></i> {{ $dataPending }} pending
            </span>
            <span class="text-gray-400">menunggu verifikasi</span>
        </div>
    </div>

    <!-- Izin Pending -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.15s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform duration-300 animate-pulse-glow">
                <i class="fa-solid fa-file-circle-exclamation text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Izin Pending</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">{{ $izins->where('status', 'pending')->count() }}</h3>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2 text-sm">
            <span class="text-amber-600">Perlu persetujuan segera</span>
        </div>
    </div>

    <!-- Data Terverifikasi -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.2s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-circle-check text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Data Terverifikasi</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-emerald-500">{{ $dataVerified }}</h3>
            </div>
        </div>
        <div class="mt-4 h-1.5 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full" style="width: {{ $totalSiswa > 0 ? round(($dataVerified / $totalSiswa) * 100) : 0 }}%"></div>
        </div>
    </div>
</section>

<!-- CONTENT SECTION -->
<section class="px-6 pb-10 grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- DAFTAR SISWA -->
    <div class="card-futuristic overflow-hidden animate-slide-up" style="animation-delay: 0.25s">
        <div class="p-6 border-b border-gray-200/60 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <div class="w-2 h-6 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
                    Daftar Siswa Terbaru
                </h3>
                <p class="text-sm text-gray-400 ml-4">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            </div>
            <a href="{{ route('admin.datasiswa') }}" class="btn-futuristic py-2.5 px-5 text-sm">
                <i class="fa-solid fa-list mr-1"></i> Kelola
            </a>
        </div>

        <div class="p-6 space-y-3">
            @forelse($siswaList as $siswa)
            <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200/60 hover:bg-blue-50/50 hover:border-blue-300 transition-all duration-200 group cursor-pointer">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white flex items-center justify-center font-bold shadow-md group-hover:scale-105 transition-transform">
                        {{ strtoupper(substr($siswa->nama_siswa ?? $siswa->user->name ?? '?', 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 group-hover:text-blue-700 transition">{{ $siswa->nama_siswa ?? $siswa->user->name ?? '-' }}</p>
                        <p class="text-sm text-gray-500">NIK: {{ $siswa->nik_siswa ?? '-' }} / Kelas {{ $siswa->kelas ?? '-' }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    @if($siswa->status_approval === 'approved')
                    <span class="text-xs px-3 py-1.5 rounded-lg bg-emerald-100 text-emerald-700 font-semibold flex items-center gap-1">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                        Terverifikasi
                    </span>
                    @elseif($siswa->status_approval === 'pending')
                    <span class="text-xs px-3 py-1.5 rounded-lg bg-amber-100 text-amber-700 font-semibold flex items-center gap-1">
                        <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                        Pending
                    </span>
                    @else
                    <span class="text-xs px-3 py-1.5 rounded-lg bg-red-100 text-red-700 font-semibold flex items-center gap-1">
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        Ditolak
                    </span>
                    @endif
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-gray-400">
                <i class="fa-solid fa-users text-3xl mb-2"></i>
                <p>Belum ada data siswa</p>
            </div>
            @endforelse
        </div>

        <div class="p-4 border-t border-gray-200/60 text-center bg-gray-50/50">
            <a href="{{ route('admin.datasiswa') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm inline-flex items-center gap-2 transition group">
                Lihat Semua Siswa 
                <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>

    <!-- IZIN TERBARU -->
    <div class="card-futuristic overflow-hidden animate-slide-up" style="animation-delay: 0.3s">
        <div class="p-6 border-b border-gray-200/60 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <div class="w-2 h-6 bg-gradient-to-b from-emerald-500 to-emerald-600 rounded-full"></div>
                    Izin Terbaru
                </h3>
                <p class="text-sm text-gray-400 ml-4">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            </div>
            <a href="{{ route('admin.kelola_izin') }}" class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white py-2.5 px-5 rounded-xl text-sm font-semibold shadow-lg shadow-emerald-500/30 hover:shadow-xl transition-all duration-300">
                <i class="fa-solid fa-plus mr-1"></i> Tambah
            </a>
        </div>

        <div class="p-6 space-y-4">
            @forelse($izins->take(5) as $izin)
            <div class="flex justify-between items-center p-4 rounded-xl 
                {{ $izin->status == 'pending' ? 'bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200/60' : 
                   ($izin->status == 'approved' ? 'bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200/60' : 
                   'bg-gradient-to-r from-red-50 to-rose-50 border border-red-200/60') }} 
                hover:shadow-md transition-all duration-200 group cursor-pointer">
                
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 
                        {{ $izin->status == 'pending' ? 'bg-gradient-to-br from-amber-500 to-orange-500' : 
                           ($izin->status == 'approved' ? 'bg-gradient-to-br from-emerald-500 to-green-500' : 
                           'bg-gradient-to-br from-red-500 to-rose-500') }} 
                        text-white rounded-xl flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-person-walking"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">{{ $izin->nama_siswa }}</p>
                        <p class="text-sm text-gray-500">{{ $izin->alasan }} — {{ \Carbon\Carbon::parse($izin->tanggal_izin)->format('d M Y') }}</p>
                    </div>
                </div>
                
                @if($izin->status == 'pending')
                    <span class="px-3 py-1.5 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold flex items-center gap-1.5">
                        <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                        Pending
                    </span>
                @elseif($izin->status == 'approved')
                    <span class="px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold flex items-center gap-1.5">
                        <i class="fa-solid fa-check text-xs"></i>
                        Disetujui
                    </span>
                @else
                    <span class="px-3 py-1.5 rounded-full bg-red-100 text-red-700 text-xs font-semibold flex items-center gap-1.5">
                        <i class="fa-solid fa-xmark text-xs"></i>
                        Ditolak
                    </span>
                @endif
            </div>
            @empty
            <div class="p-4 text-center text-gray-500">Belum ada pengajuan izin terbaru.</div>
            @endforelse
        </div>

        <div class="p-4 border-t border-gray-200/60 text-center bg-gray-50/50">
            <a href="{{ route('admin.kelola_izin') }}" class="text-emerald-600 hover:text-emerald-800 font-medium text-sm inline-flex items-center gap-2 transition group">
                Lihat Semua Izin
                <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>

</section>

</x-mainLayout>