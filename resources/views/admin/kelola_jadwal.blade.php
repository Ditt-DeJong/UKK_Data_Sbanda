<x-mainLayout 
    title="Kelola Jadwal Pelajaran" 
    :active="'jadwal'"
    pageTitle="Kelola Jadwal Pelajaran"
    pageSubtitle="Atur jadwal jam pelajaran anak-anak di sekolah"
    :notifCount="$notifCount">

<x-notifModal :dataSiswaPending="$dataSiswaPending" />

<!-- HEADER SECTION -->
<section class="p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h2 class="text-2xl font-bold border-l-4 border-blue-600 pl-3 leading-tight text-gray-800">Daftar Jadwal</h2>
        <p class="text-sm text-gray-500 mt-1 ml-4">Kelola pembagian waktu belajar harian</p>
    </div>
    <button onclick="openTambahModal()" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-6 rounded-xl font-bold shadow-lg shadow-blue-500/30 hover:shadow-xl transition-all duration-300 flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Tambah Jadwal Baru
    </button>
</section>

@if(session('success'))
<div class="px-6 pb-2">
    <div class="bg-emerald-100 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3 animate-slide-in">
        <i class="fa-solid fa-circle-check"></i>
        <p class="font-medium text-sm">{{ session('success') }}</p>
    </div>
</div>
@endif

<!-- GRID JADWAL PER HARI -->
<section class="px-6 pb-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
        @php
            $hariOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        @endphp

        @foreach($hariOrder as $h)
        @php
            $jadwalHari = $jadwal->get($h, collect());
        @endphp
        <div class="card-futuristic overflow-hidden animate-slide-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-5 text-white flex justify-between items-center">
                <h3 class="text-xl font-black tracking-tight uppercase">{{ $h }}</h3>
                <span class="bg-white/20 text-xs px-3 py-1 rounded-full font-bold backdrop-blur-md">
                    {{ $jadwalHari->count() }} Mata Pelajaran
                </span>
            </div>

            <div class="p-4 space-y-4">
                @forelse($jadwalHari as $item)
                <div class="group relative p-4 rounded-2xl bg-gray-50 border border-gray-100 hover:border-blue-200 hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="flex justify-between items-start mb-2">
                        <div class="flex items-center gap-2 text-blue-600 font-bold text-sm">
                            <i class="fa-solid fa-clock"></i>
                            {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                        </div>
                        <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button onclick="openEditModal({{ $item }})" class="p-2 text-amber-500 hover:bg-amber-50 rounded-lg transition-colors">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" class="form-confirm" data-confirm-title="Hapus Jadwal" data-confirm-message="Jadwal ini akan dihapus secara permanen. Lanjutkan?" data-confirm-danger="true">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <h4 class="text-gray-800 font-bold text-lg mb-1 leading-tight group-hover:text-blue-700 transition">{{ $item->mata_pelajaran }}</h4>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-gray-500 flex items-center gap-2">
                            <i class="fa-solid fa-chalkboard-user opacity-60"></i>
                            {{ $item->guru }}
                        </p>
                        @if($item->ruangan)
                        <p class="text-xs text-gray-400 flex items-center gap-2">
                            <i class="fa-solid fa-location-dot opacity-60"></i>
                            {{ $item->ruangan }}
                        </p>
                        @endif
                    </div>
                </div>
                @empty
                <div class="py-10 text-center opacity-30 select-none">
                    <i class="fa-solid fa-calendar-minus text-4xl mb-2"></i>
                    <p class="text-sm font-medium">Belum ada jadwal</p>
                </div>
                @endforelse
            </div>
        </div>
        @endforeach
    </div>
</section>

@push('modals')
<!-- MODAL FORM JADWAL (Tambah/Edit) -->
<div id="jadwalModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden animate-scale-in">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 text-white flex justify-between items-center">
            <h3 id="modalTitle" class="text-xl font-bold">Tambah Jadwal Baru</h3>
            <button onclick="closeModal()" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white/20 hover:bg-white/30 transition-colors">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="jadwalForm" method="POST" class="p-6 space-y-5">
            @csrf
            <div id="methodField"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Hari</label>
                    <select name="hari" id="formHari" required class="input-futuristic w-full">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="formJamMulai" required class="input-futuristic w-full">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="formJamSelesai" required class="input-futuristic w-full">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" id="formMapel" required placeholder="Contoh: Matematika" class="input-futuristic w-full">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Guru</label>
                    <input type="text" name="guru" id="formGuru" required placeholder="Nama lengkap guru" class="input-futuristic w-full">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ruangan (Opsional)</label>
                    <input type="text" name="ruangan" id="formRuangan" placeholder="Contoh: Lab IPA 1" class="input-futuristic w-full">
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeModal()" class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-2xl transition-all">Batal</button>
                <button type="submit" class="flex-1 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-blue-500/30 transition-all">Simpan Jadwal</button>
            </div>
        </form>
    </div>
</div>
@endpush

@push('scripts')
<script>
    const modal = document.getElementById('jadwalModal');
    const form = document.getElementById('jadwalForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodField = document.getElementById('methodField');

    function openTambahModal() {
        modalTitle.innerText = 'Tambah Jadwal Baru';
        form.action = "{{ route('admin.jadwal.store') }}";
        methodField.innerHTML = '';
        form.reset();
        modal.classList.remove('hidden');
    }

    function openEditModal(item) {
        modalTitle.innerText = 'Edit Jadwal';
        form.action = `/admin/kelola-jadwal/${item.id}`;
        methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('formHari').value = item.hari;
        document.getElementById('formJamMulai').value = item.jam_mulai.substring(0, 5);
        document.getElementById('formJamSelesai').value = item.jam_selesai.substring(0, 5);
        document.getElementById('formMapel').value = item.mata_pelajaran;
        document.getElementById('formGuru').value = item.guru;
        document.getElementById('formRuangan').value = item.ruangan ?? '';

        modal.classList.remove('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
    }
</script>
@endpush

</x-mainLayout>
