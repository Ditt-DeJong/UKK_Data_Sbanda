<x-mainLayout 
    title="Mading Digital" 
    :active="'pengumuman'"
    pageTitle="Mading Digital"
    pageSubtitle="Kelola pengumuman dan informasi sekolah untuk orang tua"
    :notifCount="0">

<!-- Notification Modal Component -->
<x-notifModal />

<!-- HEADER SECTION -->
<section class="p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold border-l-4 border-indigo-600 pl-3 leading-tight text-gray-800">Daftar Pengumuman</h2>
            <p class="text-sm text-gray-500 mt-1 ml-4">Buat, ubah, dan hapus pengumuman mading</p>
        </div>
        <button onclick="openTambahModal()" class="btn-primary flex items-center gap-2 group whitespace-nowrap bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white px-5 py-2.5 rounded-xl shadow-lg shadow-indigo-500/30">
            <i class="fa-solid fa-plus text-sm group-hover:rotate-90 transition-transform duration-300"></i>
            <span class="font-semibold">Buat Pengumuman</span>
        </button>
    </div>
</section>

<!-- FLASH MESSAGES -->
@if(session('success'))
<div class="px-6 pb-2">
    <div class="bg-emerald-100 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3">
        <i class="fa-solid fa-circle-check"></i>
        <p class="font-medium text-sm">{{ session('success') }}</p>
    </div>
</div>
@endif

<!-- TABLE SECTION -->
<section class="px-6 pb-10">
    <div class="card-futuristic overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100/80">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Judul & Tipe</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Konten</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pengumuman as $item)
                    <tr class="hover:bg-indigo-50/50 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <span class="font-bold text-gray-800">{{ $item->judul }}</span>
                                @if($item->tipe == 'info')
                                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md text-xs font-semibold bg-blue-100 text-blue-700 w-max">
                                    <i class="fa-solid fa-circle-info text-[10px]"></i> Info
                                </span>
                                @elseif($item->tipe == 'penting')
                                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md text-xs font-semibold bg-red-100 text-red-700 w-max">
                                    <i class="fa-solid fa-triangle-exclamation text-[10px]"></i> Penting
                                </span>
                                @else
                                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md text-xs font-semibold bg-emerald-100 text-emerald-700 w-max">
                                    <i class="fa-solid fa-calendar text-[10px]"></i> Libur
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 max-w-xs truncate text-gray-600 text-sm">
                            {{ Str::limit($item->konten, 50) }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $item->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.pengumuman.toggle', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors {{ $item->is_active ? 'bg-indigo-600' : 'bg-gray-300' }}">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform {{ $item->is_active ? 'translate-x-6' : 'translate-x-1' }}"></span>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button onclick="openEditModal({{ json_encode($item) }})" class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" class="form-confirm" data-confirm-title="Hapus Pengumuman" data-confirm-message="Pengumuman ini akan dihapus secara permanen. Lanjutkan?" data-confirm-danger="true">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                            <i class="fa-solid fa-folder-open text-4xl mb-3 block opacity-50"></i>
                            <p>Belum ada pengumuman mading</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@push('modals')
<!-- Modal Tambah/Edit -->
<div id="pengumumanModal" class="hidden fixed inset-0 z-[90] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" onclick="closePengumumanModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-xl max-h-[90vh] overflow-hidden animate-scale-in z-10 flex flex-col">
        <div class="flex items-center justify-between p-5 border-b bg-gradient-to-r from-indigo-50 to-indigo-100">
            <div>
                <h3 id="modalTitle" class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <i class="fa-solid fa-bullhorn text-indigo-600"></i>
                    Buat Pengumuman
                </h3>
            </div>
            <button type="button" onclick="closePengumumanModal()" class="w-8 h-8 flex items-center justify-center rounded-xl bg-gray-100 hover:bg-red-100 text-gray-500 hover:text-red-600 transition-all">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form id="pengumumanForm" method="POST" action="{{ route('admin.pengumuman.store') }}">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Pengumuman</label>
                        <input type="text" name="judul" id="inputJudul" required class="input-futuristic w-full" placeholder="Contoh: Pengumuman Libur Lebaran">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Tipe Prioritas</label>
                        <select name="tipe" id="inputTipe" required class="input-futuristic w-full">
                            <option value="info">Info Umum</option>
                            <option value="penting">Penting / Darurat</option>
                            <option value="libur">Libur</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Isi Konten</label>
                        <textarea name="konten" id="inputKonten" rows="5" required class="input-futuristic w-full resize-none" placeholder="Tulis rincian pengumuman di sini..."></textarea>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" onclick="closePengumumanModal()" class="px-5 py-2.5 rounded-xl font-medium text-gray-600 hover:bg-gray-100 transition-colors">Batal</button>
                    <button type="submit" class="bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-indigo-500/30">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush

@push('scripts')
<script>
    const modal = document.getElementById('pengumumanModal');
    const form = document.getElementById('pengumumanForm');
    const modalTitle = document.getElementById('modalTitle');
    const formMethod = document.getElementById('formMethod');
    const inputJudul = document.getElementById('inputJudul');
    const inputTipe = document.getElementById('inputTipe');
    const inputKonten = document.getElementById('inputKonten');

    function openTambahModal() {
        modalTitle.innerHTML = '<i class="fa-solid fa-bullhorn text-indigo-600"></i> Buat Pengumuman';
        form.action = "{{ route('admin.pengumuman.store') }}";
        formMethod.value = "POST";
        inputJudul.value = '';
        inputTipe.value = 'info';
        inputKonten.value = '';
        modal.classList.remove('hidden');
    }

    function openEditModal(data) {
        modalTitle.innerHTML = '<i class="fa-solid fa-pen text-indigo-600"></i> Edit Pengumuman';
        form.action = `/admin/pengumuman/${data.id}`;
        formMethod.value = "PUT";
        inputJudul.value = data.judul;
        inputTipe.value = data.tipe;
        inputKonten.value = data.konten;
        modal.classList.remove('hidden');
    }

    function closePengumumanModal() {
        modal.classList.add('hidden');
    }
</script>
@endpush
</x-mainLayout>
