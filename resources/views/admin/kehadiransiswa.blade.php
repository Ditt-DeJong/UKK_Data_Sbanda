<x-mainLayout 
    title="Papan Kehadiran Siswa" 
    :active="'kehadiran'"
    pageTitle="Papan Kehadiran Siswa"
    pageSubtitle="Kelola absensi harian seluruh siswa secara manual"
    :notifCount="$notifCount">

<x-notifModal :dataSiswaPending="$dataSiswaPending" />

<!-- STATISTIK CARDS -->
<section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
    <div class="card-futuristic p-6 hover-lift animate-slide-up bg-white" style="animation-delay: 0.1s">
        <p class="text-sm font-bold text-gray-500 mb-1 uppercase tracking-wider">Total Siswa</p>
        <h3 class="text-3xl font-black text-blue-600">{{ $totalSiswa }}</h3>
    </div>
    <div class="card-futuristic p-6 hover-lift animate-slide-up bg-emerald-50 border-emerald-100" style="animation-delay: 0.15s">
        <p class="text-sm font-bold text-emerald-600 mb-1 uppercase tracking-wider">Hadir</p>
        <h3 class="text-3xl font-black text-emerald-700">{{ $countHadir }}</h3>
    </div>
    <div class="card-futuristic p-6 hover-lift animate-slide-up bg-amber-50 border-amber-100" style="animation-delay: 0.2s">
        <p class="text-sm font-bold text-amber-600 mb-1 uppercase tracking-wider">Izin/Sakit</p>
        <h3 class="text-3xl font-black text-amber-700">{{ $countIzin + $countSakit }}</h3>
    </div>
    <div class="card-futuristic p-6 hover-lift animate-slide-up bg-rose-50 border-rose-100" style="animation-delay: 0.25s">
        <p class="text-sm font-bold text-rose-600 mb-1 uppercase tracking-wider">Alpha</p>
        <h3 class="text-3xl font-black text-rose-700">{{ $countAlpha }}</h3>
    </div>
    <div class="card-futuristic p-6 hover-lift animate-slide-up bg-gray-50 border-gray-200" style="animation-delay: 0.3s">
        <p class="text-sm font-bold text-gray-400 mb-1 uppercase tracking-wider">Belum Absen</p>
        <h3 class="text-3xl font-black text-gray-500">{{ $totalSiswa - ($countHadir + $countIzin + $countSakit + $countAlpha) }}</h3>
    </div>
</section>

<!-- FILTER & BOARD SECTION -->
<section class="px-6 pb-10">
    <div class="card-futuristic overflow-hidden animate-slide-up shadow-xl shadow-blue-900/5" style="animation-delay: 0.4s">
        
        <div class="p-8 border-b border-gray-100">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6">
                <div>
                    <h3 class="text-2xl font-black text-gray-800 flex items-center gap-3">
                        <span class="w-3 h-8 bg-blue-600 rounded-full"></span>
                        Status Absensi Hari Ini
                    </h3>
                    <p class="text-gray-500 font-bold mt-1">{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}</p>
                </div>
                
                <div class="flex flex-wrap gap-3">
                    <form action="{{ route('admin.kehadiransiswa.bulk') }}" method="POST" class="form-confirm" data-confirm-title="Tandai Hadir Semua" data-confirm-message="Tandai semua siswa yang belum absen sebagai HADIR?" data-confirm-danger="false">
                        @csrf
                        <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                        <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-emerald-600/20 transition-all hover:-translate-y-1">
                            <i class="fa-solid fa-check-double text-lg"></i>
                            Tandai Hadir Semua
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-8">
                <form method="GET" action="{{ route('admin.kehadiransiswa') }}" id="filterForm" class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-gray-50 p-6 rounded-3xl border border-gray-100">
                    <div>
                        <label class="text-xs font-black text-gray-400 uppercase mb-2 block tracking-widest">Pilih Tanggal</label>
                        <input type="date" name="tanggal" value="{{ $tanggal }}" class="input-friendly py-3 px-5 text-sm" onchange="this.form.submit()">
                    </div>
                    <div>
                        <label class="text-xs font-black text-gray-400 uppercase mb-2 block tracking-widest">Filter Status</label>
                        <select name="status" class="input-friendly py-3 px-5 text-sm appearance-none" onchange="this.form.submit()">
                            <option value="">Semua Siswa</option>
                            <option value="HADIR" {{ request('status') == 'HADIR' ? 'selected' : '' }}>Hadir</option>
                            <option value="IZIN" {{ request('status') == 'IZIN' ? 'selected' : '' }}>Izin/Sakit</option>
                            <option value="ALPHA" {{ request('status') == 'ALPHA' ? 'selected' : '' }}>Alpha</option>
                            <option value="BELUM_DIABSEN" {{ request('status') == 'BELUM_DIABSEN' ? 'selected' : '' }}>Belum Diabsen</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-black text-gray-400 uppercase mb-2 block tracking-widest">Cari Siswa</label>
                        <input type="text" name="search" value="{{ $search }}" placeholder="Nama siswa..." class="input-friendly py-3 px-5 text-sm">
                    </div>
                    <div class="flex items-end gap-2">
                        <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-full font-bold hover:bg-blue-700 transition-colors">Cari</button>
                        <a href="{{ route('admin.kehadiransiswa') }}" class="w-12 h-12 flex items-center justify-center bg-white border-2 border-gray-200 text-gray-400 rounded-full hover:bg-gray-50 transition-colors"><i class="fa-solid fa-rotate-left"></i></a>
                    </div>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Siswa</th>
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Status Saat Ini</th>
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Aksi Cepat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse ($kehadiran as $row)
                    <tr class="hover:bg-blue-50/30 transition-colors duration-200">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center font-black text-white text-lg shadow-lg shadow-blue-500/20">
                                    {{ strtoupper(substr($row->siswa->nama_siswa, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-black text-gray-800 leading-none">{{ $row->siswa->nama_siswa }}</p>
                                    <p class="text-xs font-bold text-gray-400 mt-1 uppercase tracking-tighter">Kelas {{ $row->siswa->kelas }} • NIS {{ $row->siswa->nik_siswa }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            @if($row->status == 'HADIR')
                                <span class="bg-emerald-100 text-emerald-700 px-4 py-2 rounded-xl text-xs font-black inline-flex items-center gap-2">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span> MASUK ({{ $row->waktu }})
                                </span>
                            @elseif($row->status == 'IZIN')
                                <span class="bg-amber-100 text-amber-700 px-4 py-2 rounded-xl text-xs font-black inline-flex items-center gap-2">
                                    <span class="w-2 h-2 bg-amber-500 rounded-full"></span> IZIN
                                </span>
                            @elseif($row->status == 'SAKIT')
                                <span class="bg-rose-100 text-rose-700 px-4 py-2 rounded-xl text-xs font-black inline-flex items-center gap-2">
                                    <span class="w-2 h-2 bg-rose-500 rounded-full"></span> SAKIT
                                </span>
                            @elseif($row->status == 'ALPHA')
                                <div class="flex flex-col gap-1.5">
                                    <span class="bg-red-600 text-white px-4 py-2 rounded-xl text-xs font-black inline-flex items-center gap-2 shadow-lg shadow-red-600/20">
                                        <i class="fa-solid fa-circle-xmark"></i> ALPHA
                                    </span>
                                    @if($row->link_wa_ortu)
                                    <a href="{{ $row->link_wa_ortu }}" target="_blank"
                                       class="inline-flex items-center gap-1.5 bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-1.5 rounded-lg text-xs font-black transition-all shadow-sm">
                                        <i class="fa-brands fa-whatsapp"></i> Beri Tahu Ortu
                                    </a>
                                    @endif
                                </div>
                            @else
                                <span class="bg-gray-100 text-gray-400 px-4 py-2 rounded-xl text-xs font-black inline-flex items-center gap-2 italic">
                                    <span class="w-2 h-2 bg-gray-300 rounded-full"></span> Belum Dicatat
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-2">
                                @if($row->status == 'BELUM_DIABSEN')
                                    <button onclick="setPresence('{{ $row->user_id }}', 'HADIR')" class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all flex items-center justify-center font-black" title="Hadir"><i class="fa-solid fa-check"></i></button>
                                    <button onclick="setPresence('{{ $row->user_id }}', 'IZIN')" class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 hover:bg-amber-600 hover:text-white transition-all flex items-center justify-center font-black" title="Izin"><i class="fa-solid fa-envelope"></i></button>
                                    <button onclick="setPresence('{{ $row->user_id }}', 'SAKIT')" class="w-10 h-10 rounded-xl bg-rose-100 text-rose-600 hover:bg-rose-600 hover:text-white transition-all flex items-center justify-center font-black" title="Sakit"><i class="fa-solid fa-medkit"></i></button>
                                    <button onclick="setPresence('{{ $row->user_id }}', 'ALPHA')" class="w-10 h-10 rounded-xl bg-gray-100 text-gray-600 hover:bg-red-600 hover:text-white transition-all flex items-center justify-center font-black" title="Alpha"><i class="fa-solid fa-xmark"></i></button>
                                @else
                                    <button onclick='openEditModal({!! json_encode($row) !!})' class="bg-blue-50 text-blue-600 px-4 py-2 rounded-xl text-xs font-black hover:bg-blue-600 hover:text-white transition-all">
                                        <i class="fa-solid fa-pen-to-square mr-1"></i> Ubah Status
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-20 text-center text-gray-400">
                            <i class="fa-solid fa-users-slash text-5xl mb-4 block opacity-20"></i>
                            <p class="font-black text-xl">Siswa Tidak Ditemukan</p>
                            <p class="text-sm">Coba ubah kata kunci pencarian atau filter.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- HIDDEN FORM FOR QUICK ACTIONS -->
<form id="quickAbsentForm" action="{{ route('admin.kehadiransiswa.update') }}" method="POST" class="hidden">
    @csrf
    @method('PUT')
    <input type="hidden" name="user_id" id="quickUserId">
    <input type="hidden" name="tanggal" value="{{ $tanggal }}">
    <input type="hidden" name="status" id="quickStatus">
    <input type="hidden" name="keterangan" value="Absensi Manual melalui Papan Board">
</form>

@push('modals')
<!-- Modal Edit/Update Kehadiran -->
<div id="editKehadiranModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-blue-900/60 backdrop-blur-md" onclick="closeEditModal()"></div>
    <div class="relative bg-white rounded-[2.5rem] shadow-2xl w-full max-w-md overflow-hidden animate-scale-in">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-2xl font-black">Edit Absensi</h3>
                    <p class="text-blue-100 font-bold" id="editLabelSiswa">Nama Siswa</p>
                </div>
                <button onclick="closeEditModal()" class="w-10 h-10 flex items-center justify-center rounded-2xl bg-white/20 hover:bg-white/30 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <form action="{{ route('admin.kehadiransiswa.update') }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')
            <input type="hidden" name="user_id" id="editUserId">
            <input type="hidden" name="tanggal" value="{{ $tanggal }}">
            
            <div>
                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Status Kehadiran</label>
                <div class="grid grid-cols-2 gap-3">
                    <label class="relative cursor-pointer group">
                        <input type="radio" name="status" value="HADIR" class="peer hidden">
                        <div class="px-4 py-3 border-2 border-gray-100 rounded-2xl text-center font-black text-sm text-gray-400 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-600 group-hover:bg-gray-50 transition-all">HADIR</div>
                    </label>
                    <label class="relative cursor-pointer group">
                        <input type="radio" name="status" value="IZIN" class="peer hidden">
                        <div class="px-4 py-3 border-2 border-gray-100 rounded-2xl text-center font-black text-sm text-gray-400 peer-checked:border-amber-500 peer-checked:bg-amber-50 peer-checked:text-amber-600 group-hover:bg-gray-50 transition-all">IZIN</div>
                    </label>
                    <label class="relative cursor-pointer group">
                        <input type="radio" name="status" value="SAKIT" class="peer hidden">
                        <div class="px-4 py-3 border-2 border-gray-100 rounded-2xl text-center font-black text-sm text-gray-400 peer-checked:border-rose-500 peer-checked:bg-rose-50 peer-checked:text-rose-600 group-hover:bg-gray-50 transition-all">SAKIT</div>
                    </label>
                    <label class="relative cursor-pointer group">
                        <input type="radio" name="status" value="ALPHA" class="peer hidden">
                        <div class="px-4 py-3 border-2 border-gray-100 rounded-2xl text-center font-black text-sm text-gray-400 peer-checked:border-red-600 peer-checked:bg-red-50 peer-checked:text-red-700 group-hover:bg-gray-50 transition-all">ALPHA</div>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Keterangan Tambahan</label>
                <textarea name="keterangan" id="editKeterangan" rows="3" class="input-friendly w-full resize-none text-sm" placeholder="Catatan tambahan (opsional)..."></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-3xl shadow-xl shadow-blue-500/30 transition-all hover:scale-[1.02] active:scale-95">
                Simpan Status
            </button>
        </form>
    </div>
</div>
@endpush

@push('scripts')
<script>
    function setPresence(userId, status) {
        document.getElementById('quickUserId').value = userId;
        document.getElementById('quickStatus').value = status;
        document.getElementById('quickAbsentForm').submit();
    }

    function openEditModal(row) {
        document.getElementById('editUserId').value = row.user_id;
        document.getElementById('editLabelSiswa').innerText = row.siswa.nama_siswa;
        document.getElementById('editKeterangan').value = row.keterangan || '';
        
        // Check corresponding radio button
        const radios = document.getElementsByName('status');
        for (let radio of radios) {
            if (radio.value === row.status) {
                radio.checked = true;
            }
        }

        document.getElementById('editKehadiranModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editKehadiranModal').classList.add('hidden');
    }
</script>
@endpush

</x-mainLayout>

