@php $dataSiswaPending = $dataSiswaPending ?? collect(); @endphp
@push('modals')
<div id="notifModal" class="hidden fixed inset-0 flex items-center justify-center pt-4 px-4 z-[70]">
    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300">

        <!-- Header -->
        <div class="p-6 border-b bg-gradient-to-r from-blue-50 to-blue-100">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Notifikasi Persetujuan</h2>
                    <p class="text-sm text-gray-600">Kelola persetujuan data siswa baru</p>
                </div>
                <button id="closeNotifModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex border-b bg-gray-50">
            <button id="tabDataSiswa" class="flex-1 py-3 text-center text-blue-600 border-b-4 border-blue-600 bg-white relative font-semibold">
                <i class="fa-solid fa-user-plus mr-2"></i> Data Siswa Baru
                @if($dataSiswaPending->count() > 0)
                <span class="absolute top-2 right-5 bg-blue-600 text-white text-xs px-2 py-1 rounded-full flex items-center justify-center min-w-[20px]">
                    {{ $dataSiswaPending->count() }}
                </span>
                @endif
            </button>
        </div>

        <!-- Isi Konten Data Siswa Baru -->
        <div id="contentDataSiswa" class="p-6 max-h-[60vh] overflow-y-auto">
            @if($dataSiswaPending->count() > 0)
                @foreach($dataSiswaPending as $data)
                <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm hover:shadow-md transition-shadow mb-4">

                    <div class="flex justify-between items-start mb-4">
                        <div class="flex gap-3">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xl flex-shrink-0">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div>
                                <p class="font-bold text-lg">{{ $data->nama_siswa ?? '-' }}</p>
                                <p class="text-gray-600 text-sm">Kelas {{ $data->kelas }}</p>
                            </div>
                        </div>

                        <p class="text-gray-500 text-sm flex items-center">
                            <i class="fa-regular fa-clock mr-1"></i> 
                            {{ $data->created_at->diffForHumans() }}
                        </p>
                    </div>

                    <div class="text-gray-700 space-y-3 mb-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="font-semibold text-sm text-gray-500">NIK:</p>
                                <p class="text-gray-800">{{ $data->nik_siswa ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="font-semibold text-sm text-gray-500">Jenis Kelamin:</p>
                                <p class="text-gray-800">{{ $data->jenis_kelamin }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="font-semibold text-sm text-gray-500">Tempat, Tanggal Lahir:</p>
                            <p class="text-gray-800">{{ $data->tempat_tanggal_lahir }}</p>
                        </div>

                        <div>
                            <p class="font-semibold text-sm text-gray-500">Alamat:</p>
                            <p class="text-gray-800">{{ $data->alamat }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="font-semibold text-sm text-gray-500">Agama:</p>
                                <p class="text-gray-800">{{ $data->agama }}</p>
                            </div>
                            <div>
                                <p class="font-semibold text-sm text-gray-500">Nama Orang Tua:</p>
                                <p class="text-gray-800">{{ $data->orangTua->nama_orang_tua ?? $data->user->name ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="font-semibold text-sm text-gray-500">No. Telepon:</p>
                                <p class="text-gray-800">{{ $data->orangTua->nomor_telepon ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <form action="{{ route('admin.approve.siswa', $data->id) }}" method="POST" class="form-confirm" data-confirm-title="Setujui Data Siswa" data-confirm-message="Apakah Anda yakin ingin menyetujui siswa ini untuk tergabung dalam sistem?" data-confirm-danger="false">
                            @csrf
                            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors flex items-center justify-center gap-2">
                                <i class="fa-solid fa-check"></i> Setujui
                            </button>
                        </form>
                        
                        <button onclick="openRejectModal({{ $data->id }}, '{{ $data->nama_siswa ?? '' }}')" class="bg-red-50 text-red-600 py-3 rounded-lg font-semibold border-2 border-red-300 hover:bg-red-100 transition-colors flex items-center justify-center gap-2">
                            <i class="fa-solid fa-times"></i> Tolak
                        </button>
                    </div>

                </div>
                @endforeach
            @else
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-inbox text-gray-400 text-3xl"></i>
                    </div>
                    <p class="text-gray-500 text-lg font-medium">Tidak ada data siswa baru</p>
                    <p class="text-gray-400 text-sm mt-2">Semua permohonan sudah diproses</p>
                </div>
            @endif
        </div>

    </div>
</div>

<!-- Modal Reject -->
<div id="rejectModal" class="hidden fixed inset-0 flex items-center justify-center pt-4 px-4 z-[80]">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden">
        <div class="p-6 border-b bg-red-50">
            <h3 class="text-lg font-semibold text-gray-800">Alasan Penolakan</h3>
        </div>
        
        <form id="rejectForm" method="POST" class="p-6">
            @csrf
            <input type="hidden" id="rejectDataId" name="data_id">
            
            <div class="mb-4">
                <p class="text-gray-700 mb-2">Anda akan menolak data siswa: <strong id="rejectNamaSiswa"></strong></p>
                <label class="block text-sm font-medium text-gray-700 mb-2">Alasan Penolakan:</label>
                <textarea name="alasan_penolakan" rows="4" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                    placeholder="Masukkan alasan penolakan..."></textarea>
            </div>
            
            <div class="flex gap-3">
                <button type="button" onclick="closeRejectModal()" class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg font-semibold hover:bg-gray-300 transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-red-600 text-white py-2 rounded-lg font-semibold hover:bg-red-700 transition">
                    Tolak Data
                </button>
            </div>
        </form>
    </div>
</div>

@endpush

@push('scripts')
<script>
    // Close notification modal (wrapped in IIFE to avoid const conflicts)
    (function() {
        const closeNotifBtn = document.getElementById("closeNotifModal");

        closeNotifBtn?.addEventListener("click", () => {
            document.getElementById("notifModal")?.classList.add("hidden");
            document.getElementById("overlay")?.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        });
    })();

    // Reject Modal Functions
    function openRejectModal(dataId, namaSiswa) {
        const rejectModal = document.getElementById('rejectModal');
        const rejectForm = document.getElementById('rejectForm');
        const rejectDataId = document.getElementById('rejectDataId');
        const rejectNamaSiswa = document.getElementById('rejectNamaSiswa');
        
        rejectForm.action = `/admin/reject-siswa/${dataId}`;
        rejectDataId.value = dataId;
        rejectNamaSiswa.textContent = namaSiswa;
        
        rejectModal?.classList.remove('hidden');
        document.getElementById("overlay")?.classList.remove('hidden');
    }

    function closeRejectModal() {
        document.getElementById('rejectModal')?.classList.add('hidden');
        document.getElementById("overlay")?.classList.add('hidden');
    }
</script>
@endpush