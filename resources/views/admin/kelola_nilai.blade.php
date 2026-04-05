<x-mainLayout 
    title="Data Nilai Akademik" 
    :active="'nilai'"
    pageTitle="Data Nilai Akademik"
    pageSubtitle="Kelola nilai tugas dan ulangan harian siswa"
    :notifCount="0">

<x-notifModal />

<!-- HEADER SECTION -->
<section class="p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold border-l-4 border-fuchsia-600 pl-3 leading-tight text-gray-800">Daftar Siswa</h2>
            <p class="text-sm text-gray-500 mt-1 ml-4">Pilih siswa untuk melihat dan mengisi nilai akademiknya</p>
        </div>
    </div>
</section>

@if(session('success'))
<div class="px-6 pb-2">
    <div class="bg-emerald-100 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3">
        <i class="fa-solid fa-circle-check"></i>
        <p class="font-medium text-sm">{{ session('success') }}</p>
    </div>
</div>
@endif

<!-- SEARCH & FILTER -->
<section class="px-6 pb-4">
    <div class="relative">
        <input type="text" id="searchInput" placeholder="Cari nama atau nis siswa..." class="input-futuristic w-full md:w-1/3 pl-10">
        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
            <i class="fa-solid fa-search"></i>
        </div>
    </div>
</section>

<!-- GRID SISWA -->
<section class="px-6 pb-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="siswaGrid">
        @forelse($siswa as $s)
        <div class="card-futuristic p-6 hover-lift cursor-pointer siswa-card" onclick="openNilaiModal({{ $s->id }}, '{{ addslashes($s->nama_siswa) }}')">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-fuchsia-100 to-fuchsia-200 rounded-full flex items-center justify-center text-fuchsia-600 font-bold text-xl ring-4 ring-white shadow-sm">
                    {{ strtoupper(substr($s->nama_siswa, 0, 1)) }}
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 text-lg leading-tight siswa-nama">{{ $s->nama_siswa }}</h3>
                    <p class="text-sm text-gray-500 siswa-nis">NIS: <span class="font-mono text-gray-600">{{ $s->nik_siswa }}</span></p>
                </div>
            </div>
            <div class="flex gap-2 mt-4">
                <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-3 py-1 rounded-full"><i class="fa-solid fa-screen-users mr-1"></i> Kelas {{ $s->kelas }}</span>
            </div>
        </div>
        @empty
        <div class="col-span-full py-10 text-center text-gray-400">
            <i class="fa-solid fa-users-slash text-4xl mb-3"></i>
            <p>Belum ada data siswa aktif</p>
        </div>
        @endforelse
    </div>
</section>

@push('modals')
<!-- Modal Detail Nilai -->
<div id="nilaiModal" class="hidden fixed inset-0 z-[90] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" onclick="closeNilaiModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-5xl h-[90vh] flex flex-col overflow-hidden animate-scale-in z-10">
        
        <!-- Header -->
        <div class="flex items-center justify-between p-5 border-b bg-gradient-to-r from-fuchsia-50 to-fuchsia-100 shrink-0">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                    <i class="fa-solid fa-graduation-cap text-fuchsia-600"></i>
                    Detail Nilai Akademik
                </h3>
                <p id="modalStudentName" class="text-sm text-gray-600 font-medium mt-1"></p>
            </div>
            <button onclick="closeNilaiModal()" class="w-9 h-9 flex flex-shrink-0 items-center justify-center rounded-xl bg-gray-100 hover:bg-red-100 text-gray-500 hover:text-red-600 transition-all">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <!-- Layout Body -->
        <div class="flex flex-col lg:flex-row flex-1 overflow-hidden">
            <!-- Form Input Nilai (Kiri) -->
            <div class="w-full lg:w-1/3 border-b lg:border-b-0 lg:border-r border-gray-200 p-6 bg-gray-50 overflow-y-auto">
                <h4 class="font-bold text-gray-800 mb-4 border-b pb-2"><i class="fa-solid fa-plus-circle text-fuchsia-600 mr-1"></i> Input Nilai Baru</h4>
                <form id="formInputNilai" action="{{ route('admin.nilai.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="siswa_id" id="inputSiswaId">
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Mata Pelajaran</label>
                        <select name="mata_pelajaran" required class="input-futuristic w-full">
                            <option value="">-- Pilih Mapel --</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="IPA">IPA (Ilmu Pengetahuan Alam)</option>
                            <option value="IPS">IPS (Ilmu Pengetahuan Sosial)</option>
                            <option value="PKN">Pendidikan Kewarganegaraan</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="PJOK">PJOK / Olahraga</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Nilai</label>
                        <select name="jenis_nilai" required class="input-futuristic w-full">
                            <option value="">-- Kategori --</option>
                            <option value="Tugas 1">Tugas 1</option>
                            <option value="Tugas 2">Tugas 2</option>
                            <option value="Tugas 3">Tugas 3</option>
                            <option value="Ulangan Harian 1">Ulangan Harian 1</option>
                            <option value="Ulangan Harian 2">Ulangan Harian 2</option>
                            <option value="Praktek">Praktek / Keterampilan</option>
                            <option value="UTS">UTS (Ujian Tengah Semester)</option>
                            <option value="UAS">UAS (Ujian Akhir Semester)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nilai (0-100)</label>
                        <input type="number" name="nilai_angka" required min="0" max="100" class="input-futuristic w-full" placeholder="100">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Keterangan (Opsional)</label>
                        <textarea name="keterangan" rows="2" class="input-futuristic w-full resize-none" placeholder="Catatan untuk siswa (opsional)"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-fuchsia-500 to-fuchsia-600 hover:from-fuchsia-600 hover:to-fuchsia-700 text-white font-bold py-2.5 rounded-xl shadow-lg shadow-fuchsia-500/30 transition-all">Simpan Nilai</button>
                </form>
            </div>

            <!-- Tabel Riwayat Nilai (Kanan) -->
            <div class="w-full lg:w-2/3 p-6 flex flex-col bg-white overflow-hidden">
                <h4 class="font-bold text-gray-800 mb-4 flex justify-between items-center">
                    <span><i class="fa-solid fa-list-check text-fuchsia-600 mr-1"></i> Rekap Nilai</span>
                    <button onclick="refreshDataNilai()" class="text-fuchsia-600 hover:text-fuchsia-700 text-sm font-semibold bg-fuchsia-50 px-3 py-1 rounded-lg"><i class="fa-solid fa-arrows-rotate mr-1"></i> Refresh</button>
                </h4>
                
                <div class="flex-1 overflow-y-auto rounded-xl border border-gray-100 relative" id="tableContainer">
                    <div class="absolute inset-0 flex items-center justify-center bg-white/80 z-20 hidden" id="loadingIndicator">
                        <i class="fa-solid fa-circle-notch fa-spin text-3xl text-fuchsia-600"></i>
                    </div>
                    <div id="nilaiTableContent" class="h-full">
                        <!-- Konten tabel di-load via AJAX partials -->
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endpush

@push('scripts')
<script>
    let currentSiswaId = null;

    // Filter Search
    document.getElementById('searchInput')?.addEventListener('input', function(e) {
        let val = e.target.value.toLowerCase();
        let cards = document.querySelectorAll('.siswa-card');
        
        cards.forEach(card => {
            let nama = card.querySelector('.siswa-nama').innerText.toLowerCase();
            let nis = card.querySelector('.siswa-nis').innerText.toLowerCase();
            
            if(nama.includes(val) || nis.includes(val)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    function openNilaiModal(siswaId, namaSiswa) {
        currentSiswaId = siswaId;
        document.getElementById('inputSiswaId').value = siswaId;
        document.getElementById('modalStudentName').innerText = 'Siswa: ' + namaSiswa;
        document.getElementById('nilaiModal').classList.remove('hidden');
        document.getElementById('formInputNilai').reset();
        
        refreshDataNilai();
    }

    function closeNilaiModal() {
        document.getElementById('nilaiModal').classList.add('hidden');
    }

    function refreshDataNilai() {
        if(!currentSiswaId) return;
        
        let container = document.getElementById('nilaiTableContent');
        let loader = document.getElementById('loadingIndicator');
        
        loader.classList.remove('hidden');
        
        fetch(`/admin/nilai/siswa/${currentSiswaId}`)
            .then(res => res.json())
            .then(data => {
                container.innerHTML = data.html;
                loader.classList.add('hidden');
            })
            .catch(err => {
                container.innerHTML = '<div class="p-8 text-center text-red-500">Gagal memuat data nilai.</div>';
                loader.classList.add('hidden');
            });
    }
</script>
@endpush
</x-mainLayout>
