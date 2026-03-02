<x-mainLayout 
    title="Persetujuan Ijin" 
    :active="'kelola-izin'"
    pageTitle="Persetujuan Ijin"
    pageSubtitle="Kelola permohonan izin siswa"
    :notifCount="3">

<!-- Modal Components -->
<x-notifModal />
<x-ijinModal />
<x-siswa-modal />
<x-kehadiran-modal />

<!-- STATISTIK CARDS -->
<section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Pending -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.1s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform duration-300 animate-pulse-glow">
                <i class="fa-solid fa-clock text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Pending</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">{{ $izins->where('status', 'pending')->count() }}</h3>
            </div>
        </div>
        <p class="mt-3 text-sm text-amber-600">Menunggu persetujuan</p>
    </div>

    <!-- Disetujui -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.15s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-green-500 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-check-circle text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Disetujui</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-green-500">{{ $izins->where('status', 'approved')->count() }}</h3>
            </div>
        </div>
    </div>

    <!-- Ditolak -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.2s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg shadow-red-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-times-circle text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Ditolak</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-rose-500">{{ $izins->where('status', 'rejected')->count() }}</h3>
            </div>
        </div>
    </div>

    <!-- Total Izin -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.25s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-file-lines text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Izin</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-500">{{ $izins->count() }}</h3>
            </div>
        </div>
    </div>
</section>

<!-- FILTER & TABLE SECTION -->
<section class="px-6 pb-10">
    <div class="card-futuristic overflow-hidden animate-slide-up" style="animation-delay: 0.3s">

        <!-- Header dengan Filter -->
        <div class="p-6 border-b border-gray-200/60">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <div class="w-2 h-6 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
                        Permohonan Ijin
                    </h3>
                    <p class="text-sm text-gray-500 ml-4">{{ $izins->where('status', 'pending')->count() }} ijin menunggu persetujuan</p>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="flex gap-2 flex-wrap">
                <button class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold text-sm shadow-lg shadow-blue-500/30 transition-all duration-300">
                    <i class="fa-solid fa-clock mr-2"></i> Pending
                </button>
                <button class="px-5 py-2.5 rounded-xl bg-gray-100 text-gray-600 hover:bg-emerald-100 hover:text-emerald-700 font-semibold text-sm transition-all duration-300">
                    <i class="fa-solid fa-check mr-2"></i> Disetujui
                </button>
                <button class="px-5 py-2.5 rounded-xl bg-gray-100 text-gray-600 hover:bg-red-100 hover:text-red-700 font-semibold text-sm transition-all duration-300">
                    <i class="fa-solid fa-xmark mr-2"></i> Ditolak
                </button>
                <button class="px-5 py-2.5 rounded-xl bg-gray-100 text-gray-600 hover:bg-gray-200 font-semibold text-sm transition-all duration-300">
                    <i class="fa-solid fa-list mr-2"></i> Semua
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100/80">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nama Siswa</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Orang Tua</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Alasan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($izins as $izin)
                    <tr class="hover:bg-gray-50/50 transition-colors duration-200 group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center font-bold text-white shadow-md group-hover:scale-105 transition-transform">
                                    {{ strtoupper(substr($izin->nama_siswa, 0, 1)) }}
                                </div>
                                <p class="font-semibold text-gray-800">{{ $izin->nama_siswa }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">{{ $izin->siswa->kelas ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $izin->siswa->orangTua->nama_orang_tua ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $izin->alasan }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($izin->tanggal_izin)->format('Y-m-d') }}</td>
                        <td class="px-6 py-4">
                            @if($izin->status == 'pending')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold">
                                <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                                Pending
                            </span>
                            @elseif($izin->status == 'approved')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">
                                <i class="fa-solid fa-check text-xs"></i>
                                Disetujui
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                                <i class="fa-solid fa-xmark text-xs"></i>
                                Ditolak
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button onclick="openDetailModal({
                                    nama: '{{ $izin->nama_siswa }}',
                                    kelas: '{{ $izin->siswa->kelas ?? '-' }}',
                                    ortu: '{{ $izin->siswa->orangTua->nama_orang_tua ?? '-' }}',
                                    alasan: '{{ $izin->alasan }}',
                                    mulai: '{{ $izin->tanggal_izin }}',
                                    selesai: '{{ $izin->tanggal_izin }}',
                                    diajukan: '{{ $izin->created_at->format('Y-m-d H:i') }}',
                                    status: '{{ ucfirst($izin->status) }}',
                                    keterangan: '{{ $izin->keterangan }}'
                                })" class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                
                                @if($izin->status == 'pending')
                                <form action="{{ route('admin.kelola_izin.approve', $izin->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="w-9 h-9 flex items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200" title="Setujui">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.kelola_izin.reject', $izin->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-200" title="Tolak">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">Belum ada data permohonan izin</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
</x-mainLayout>
