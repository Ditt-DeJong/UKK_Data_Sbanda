<x-mainLayout 
    title="Data Siswa" 
    :active="'data-siswa'"
    pageTitle="Data Siswa"
    pageSubtitle="Kelola data siswa dan informasi akademik"
    :notifCount="$dataSiswaPending->count()">

<!-- Notification Modal -->
<x-notifModal :dataSiswaPending="$dataSiswaPending" />
<!-- Modal untuk Detail, Kehadiran, DLL -->
<x-ijinModal />
<!-- <x-siswa-modal /> -->
<x-kehadiran-modal />

<!-- STATISTIK -->
<section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Total Siswa -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.1s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-users text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Siswa</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-500">{{ $totalSiswa }}</h3>
            </div>
        </div>
        <div class="mt-4 h-1.5 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full animate-shimmer" style="width: 100%"></div>
        </div>
    </div>

    <!-- Siswa Aktif -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.15s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-user-check text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Siswa Aktif</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-emerald-500">{{ $siswaAktif }}</h3>
            </div>
        </div>
        <div class="mt-4 h-1.5 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full" style="width: {{ $totalSiswa > 0 ? ($siswaAktif / $totalSiswa) * 100 : 0 }}%"></div>
        </div>
    </div>

    <!-- Siswa Pending -->
    <div class="card-futuristic p-6 hover-lift animate-slide-up group" style="animation-delay: 0.2s">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-user-clock text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Siswa Pending</p>
                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">{{ $siswaPending }}</h3>
            </div>
        </div>
        <div class="mt-4 h-1.5 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-gradient-to-r from-amber-500 to-orange-500 rounded-full" style="width: {{ $totalSiswa > 0 ? ($siswaPending / $totalSiswa) * 100 : 0 }}%"></div>
        </div>
    </div>
</section>

<!-- FILTER + TABLE -->
<section class="px-6 pb-10">
    <div class="card-futuristic overflow-hidden animate-slide-up" style="animation-delay: 0.25s">

        <!-- Header -->
        <div class="p-6 border-b border-gray-200/60 flex flex-col lg:flex-row justify-between items-center gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <div class="w-2 h-6 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
                    Daftar Siswa
                </h3>
                <p class="text-sm text-gray-500 ml-4">Kelola data siswa secara lengkap</p>
            </div>

            <!-- Tombol Tambah -->
            <button onclick="openTambahSiswaModal()" class="btn-futuristic py-3 px-6 flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Tambah Siswa Baru
            </button>
        </div>

        <!-- Search + Filter -->
        <div class="p-6 border-b border-gray-200/60 flex flex-col lg:flex-row gap-4 bg-gray-50/50">
            <div class="flex-1 relative">
                <input type="text" id="searchInput" placeholder="Cari siswa berdasarkan nama atau NIS..." 
                       class="input-futuristic w-full pl-12">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="fa-solid fa-search"></i>
                </div>
            </div>

            <div class="relative w-full lg:w-48">
                <select class="input-futuristic w-full appearance-none pr-12 cursor-pointer" id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                    <option value="Pending">Pending</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div>
        </div>

        <!-- TABEL DINAMIS -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100/80">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">NIS</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Orang Tua</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Telepon</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($siswaList as $s)
                    <tr class="hover:bg-blue-50/50 transition-colors duration-200 group siswa-row" 
                        data-nama="{{ strtolower($s->nama_siswa ?? $s->user->name ?? '') }}"
                        data-nis="{{ strtolower($s->nik_siswa ?? '') }}"
                        data-status="{{ ucfirst($s->status ?? 'nonaktif') }}">
                        <td class="px-6 py-4">
                            <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded">{{ $s->nik_siswa }}</span>
                        </td>
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center font-bold text-white shadow-md group-hover:scale-105 transition-transform">
                                {{ strtoupper(substr($s->user->name,0,1)) }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">{{ $s->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $s->jenis_kelamin }} • {{ $s->umur }} tahun</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">
                                <i class="fa-solid fa-school text-xs"></i>
                                {{ $s->kelas ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $s->orangTua->nama_orang_tua ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @if($s->orangTua && $s->orangTua->nomor_telepon)
                            <a href="tel:{{ $s->orangTua->nomor_telepon }}" class="text-blue-600 hover:text-blue-700 hover:underline">
                                {{ $s->orangTua->nomor_telepon }}
                            </a>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($s->status == 'aktif')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                Aktif
                            </span>
                            @elseif($s->status == 'pending')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                                Pending
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-gray-200 text-gray-600">
                                <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                Nonaktif
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button onclick='openDetailSiswaModal(@json($s))' class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200" title="Detail">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button onclick='openEditSiswaModal(@json($s))' class="w-9 h-9 flex items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <form action="{{ route('admin.datasiswa.delete', $s->id) }}" method="POST" class="inline form-confirm" data-confirm-title="Hapus Data Siswa" data-confirm-message="Data siswa ini akan dihapus secara permanen dan tidak dapat dikembalikan!" data-confirm-danger="true">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-200" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>

@push('modals')
<!-- MODAL TAMBAH & EDIT SISWA (INLINE) -->
<div id="modalSiswa" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center z-[70]">
    <div class="card-futuristic w-full max-w-lg p-8 relative animate-scale-in">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-user-plus text-white text-lg"></i>
            </div>
            <h2 id="modalTitle" class="text-xl font-bold text-gray-800">Tambah Siswa</h2>
        </div>

        <form id="formSiswa" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" id="methodField" name="_method" value="POST">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">NIS / NIK</label>
                    <input type="text" id="nik_siswa" name="nik_siswa" class="input-futuristic w-full" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Siswa</label>
                    <input type="text" id="nama_siswa" name="nama_siswa" class="input-futuristic w-full" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="input-futuristic w-full appearance-none" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Umur</label>
                    <input type="number" id="umur" name="umur" class="input-futuristic w-full" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="input-futuristic w-full">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select id="status" name="status" class="input-futuristic w-full appearance-none">
                        <option value="aktif">Aktif</option>
                        <option value="pending">Pending</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Orang Tua</label>
                    <input type="text" id="nama_orang_tua" name="nama_orang_tua" class="input-futuristic w-full">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Telepon Orang Tua</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" class="input-futuristic w-full">
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeModal()" class="px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-xl font-medium transition-all duration-200">
                    Batal
                </button>
                <button type="submit" class="btn-futuristic py-2.5 px-6">
                    <i class="fa-solid fa-check mr-2"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endpush

@push('scripts')
<script>
function openTambahSiswaModal() {
    document.getElementById('modalTitle').innerText = 'Tambah Siswa';
    document.getElementById('formSiswa').reset();
    document.getElementById('formSiswa').action = "{{ route('admin.datasiswa.store') }}";
    document.getElementById('methodField').value = 'POST';
    showModal();
}

function openEditSiswaModal(data) {
    document.getElementById('modalTitle').innerText = 'Edit Siswa';
    document.getElementById('formSiswa').action = `/admin/datasiswa/update/${data.id}`;
    document.getElementById('methodField').value = 'PUT';

    document.getElementById('nik_siswa').value = data.nik_siswa;
    document.getElementById('nama_siswa').value = data.nama_siswa;
    document.getElementById('jenis_kelamin').value = data.jenis_kelamin;
    document.getElementById('umur').value = data.umur;
    document.getElementById('kelas').value = data.kelas ?? '';
    document.getElementById('status').value = data.status;
    document.getElementById('nama_orang_tua').value = data.orang_tua?.nama_orang_tua ?? '';
    document.getElementById('nomor_telepon').value = data.orang_tua?.nomor_telepon ?? '';

    showModal();
}

function showModal() {
    document.getElementById('modalSiswa').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modalSiswa').classList.add('hidden');
}

// ========= SEARCH & STATUS FILTER =========
function filterTable() {
    const searchVal = document.getElementById('searchInput').value.toLowerCase();
    const statusVal = document.getElementById('filterStatus').value;
    const rows = document.querySelectorAll('.siswa-row');

    rows.forEach(row => {
        const nama = row.dataset.nama || '';
        const nis = row.dataset.nis || '';
        const rowStatus = row.dataset.status || '';

        const matchSearch = nama.includes(searchVal) || nis.includes(searchVal);
        const matchStatus = !statusVal || rowStatus === statusVal;

        row.style.display = (matchSearch && matchStatus) ? '' : 'none';
    });
}

document.getElementById('searchInput')?.addEventListener('input', filterTable);
document.getElementById('filterStatus')?.addEventListener('change', filterTable);
</script>
@endpush

</x-mainLayout>
